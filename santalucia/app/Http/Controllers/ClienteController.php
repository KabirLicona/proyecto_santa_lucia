<?php

namespace App\Http\Controllers;
use PDF;
use App\Cliente;
use App\Empresa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ClienteExport;
use App\Imports\ClienteImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\cliente\StoreClienteRequest;
use App\Http\Requests\cliente\UpdateClienteRequest;


class ClienteController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = Cliente::latest()->with('empresa');

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $cliente = $cliente->where('nombre_cliente','like',"%".$this->keyword."%");

            $cliente = $cliente->orWhereHas('empresa', function ($query) {
                $query->where('nombre_empresa', 'like', "%".$this->keyword."%");

                    
            });

                   
        }
        
        return view('cliente.index')->with('cliente', $cliente->paginate(10));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $empresa = Empresa::all();
       // dd(request()->session()->get('_previous')['url']);
        
        return view('cliente.create')->with('empresa', $empresa);
     
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $imagen = '';
        if($request->hasFile('imagen')){
            $imagen = $this->uploadImagen($request);
        }else{
            $imagen = "cliente_default.jpg";
        }
        // $image = $request->cover->store('cover');

        Cliente::create([
            'nombre_cliente' => $request->nombre_cliente,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo' => $request->correo,
            'empresa_id' => $request->empresa_id,
            'imagen' => $imagen
        ]);

        session()->flash('success', 'Datos del cliente agregados con éxito');

        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $empresa = Empresa::all();
        // dd(request()->session()->get('_previous')['url']);
        
        return view('cliente.edit')
                ->with('cliente', $cliente)
                ->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
       $data = $request->only([
            'nombre_cliente',
            'direccion',
            'telefono',
            'celular',
            'correo',
            'empresa_id',
            'imagen',            
        ]);

        if($request->hasFile('imagen')){
            $imagen = $this->uploadImagen($request);

            if($cliente->imagen !== "cliente_default.jpg"){
                File::delete('img/imagen/'.$cliente->imagen);
            }

            $data['imagen'] = $imagen;
        }
        $cliente->update($data);

   
        //$$cliente->update();
        $cliente->update($data);

        session()->flash('success', "Datos cliente : $cliente->nombre_cliente  Cambiado exitosamente");

        //redirect user
        return redirect(route('cliente.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AppCliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if($cliente->imagen !== "cliente_default.jpg"){
            File::delete('img/imagen/'.$cliente->imagen);
        }
        
        $cliente->delete();

        session()->flash('success', "Datos cliente : $cliente->nombre_cliente Cambiado exitosamente");

        return redirect(route('cliente.index'));
    }


    /**
     * Imprimir PDF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PDF
     */
    public function reportPdf(Request $request)
    {
        
        $cliente = Cliente::all();
        
        $pdf = PDF::setOptions([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',  
            ])
            ->loadView('cliente.report.pdf', [
                'cliente' => $cliente,
            ]);

        return $pdf->stream();
        
    }


    /**
     * Export data ke Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return excel
     */
    public function export() 
    {
        return (new ClienteExport())->download('detalle-cliente.xlsx');
        // return Excel::download(new clienteExport, 'cliente.xlsx');
    }

    /**
     * Import data dari excel ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_cliente' => 'required|nullable|mimes:xls,xlsx|max:1000'
        ]);

        $file = request()->file('import_cliente');
                
        Excel::import(new ClienteImport, request()->file('import_cliente'));
        
        session()->flash('success', "Datos Importados");

        //redirect user
        return redirect(route('cliente.index'));
    }

    /**
     * Upload Imagen cliente.
     *
     * @param  mixed  $request
     * @return string $imagen nombre file cliente
     */
    public function uploadImagen($request)
    {
        $nombreFile = Str::slug($request->nombre_cliente);
        $ext = explode('/', $request->imagen->getClientMimeType())[1];
        $uniq = uniqid();
        $imagen = "$nombreFile-$uniq.$ext";
        $request->imagen->move(public_path('img/imagen'), $imagen);

        return $imagen;
    }
}
