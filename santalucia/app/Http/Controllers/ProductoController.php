<?php
	/*=============================================
	IMPORTAMOS LOS RECUSOS (BIBLIOTECAS)
    =============================================*/
namespace App\Http\Controllers;

use PDF;
use App\Producto;
use App\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProductoExport;
use App\Imports\ProductoImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Producto\StoreProductoRequest;
use App\Http\Requests\Producto\UpdateProductoRequest;

class ProductoController extends Controller
{


  /*=============================================
    LLAMAMOS LOS DATOS DE LA BASE DE DATOS.
    =============================================*/


    public $keyword = '';

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $producto = Producto::latest()->with('categoria');

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $producto = $producto->where('nombre_producto','like',"%".$this->keyword."%");

            $producto = $producto->orWhereHas('categoria', function ($query) {
                $query->where('nombre_categoria', 'like', "%".$this->keyword."%");
            });
            
        }
        
        return view('producto.index')->with('producto', $producto->paginate(10));
    }



    /*=============================================
	MOSTRAMOS EN EL FORMULARIO EL DATO DEL COMBOBOX.
    =============================================*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        // dd(request()->session()->get('_previous')['url']);
        
        return view('producto.create')->with('categoria', $categoria);
    }






    /*=============================================
	CREAR EL REGISTRO EN LA BASE DE DATOS.
    =============================================*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $imagen = '';
        if($request->hasFile('imagen')){
            $imagen = $this->uploadImagen($request);
        }else{
            $imagen = "producto_default.jpg";
        }
        // $image = $request->cover->store('cover');

        Producto::create([
            'nombre_producto' => $request->nombre_producto,
            'categoria_id' => $request->categoria_id,
            'stok' => $request->stok,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'descripcion' => $request->descripcion,
            'imagen' => $imagen
        ]);

        session()->flash('success', 'Datos del producto agregados con éxito');

        return redirect(route('producto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }
    



    /*==========================================================
	EDITAMOS EL REGISTRO EN LA BASE DE DATOS CON LA FUNCION edit.
    ============================================================*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categoria = Categoria::all();
        // dd(request()->session()->get('_previous')['url']);
        
        return view('producto.edit')
                ->with('producto', $producto)
                ->with('categoria', $categoria);
    }





    /*==========================================================
    MODIFICAR EL REGISTRO EN LA BASE DE DATOS CON LA FUNCION update.
    ============================================================*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $data = $request->only([
            'nombre_producto', 
            'categoria_id', 
            'precio_compra', 
            'precio_venta', 
            'stok', 
            'descripcion',
        ]);

        if($request->hasFile('imagen')){
            $imagen = $this->uploadImagen($request);

            if($producto->imagen !== "producto_default.jpg"){
                File::delete('img/imagen/'.$producto->imagen);
            }

            $data['imagen'] = $imagen;
        }

        
        $producto->update($data);

        session()->flash('success', "Datos producto : $producto->nombre_producto  Cambiado exitosamente");

        //redirect user
        return redirect(route('producto.index'));
    }



    /*===============================================================
    ELIMINAMOS EL REGISTRO EN LA BASE DE DATOS CON LA FUNCION destroy.
    =================================================================*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \AppProducto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if($producto->imagen !== "producto_default.jpg"){
            File::delete('img/imagen/'.$producto->imagen);
        }
        
        $producto->delete();

        session()->flash('success', "Datos producto : $producto->nombre_producto Cambiado exitosamente");

        return redirect(route('producto.index'));
    }





    /*==========================================================
    FUNCION PARA ENVIAR LOS DATOS A UN DOCUMENTO PDF.
    ============================================================*/
    /**
     * Imprimir PDF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PDF
     */
    public function reportPdf(Request $request)
    {
        
        $producto = Producto::all();
        
        $pdf = PDF::setOptions([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',  
            ])
            ->loadView('producto.report.pdf', [
                'producto' => $producto,
            ]);

        return $pdf->stream();
        
    }





    /*==========================================================
    FUNCION PARA EXPORTAR LOS DATOS A EXCEL.
    ============================================================*/
    /**
     * Export data ke Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return excel
     */
    public function export() 
    {
        return (new ProductoExport())->download('detalle-producto.xlsx');
        // return Excel::download(new productoExport, 'producto.xlsx');
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
            'import_producto' => 'required|nullable|mimes:xls,xlsx|max:10'
        ]);

        $file = request()->file('import_producto');
                
        Excel::import(new ProductoImport, request()->file('import_producto'));
        
        session()->flash('success', "Datos Importados");

        //redirect user
        return redirect(route('producto.index'));
    }

    /*==========================================================
    FUNCION PARA SUBIR LA IMAGEN(FOTO).
    ============================================================*/
    /**
     * Upload Imagen producto.
     *
     * @param  mixed  $request
     * @return string $imagen nombre file producto
     */
    public function uploadImagen($request)
    {
        $nombreFile = Str::slug($request->nombre_producto);
        $ext = explode('/', $request->imagen->getClientMimeType())[1];
        $uniq = uniqid();
        $imagen = "$nombreFile-$uniq.$ext";
        $request->imagen->move(public_path('img/imagen'), $imagen);

        return $imagen;
    }

}
