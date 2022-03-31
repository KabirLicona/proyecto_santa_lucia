<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $empresa = Empresa::latest();

        if (!empty($request->keyword)) {
            $empresa = $empresa->where('nombre_empresa','like',"%".$request->keyword."%");
        }
        
        return view('empresa.index')->with('empresa', $empresa->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_empresa' => 'required|string|max:100'
        ]);

        $empresa = Empresa::create([
            'nombre_empresa' => $request->nombre_empresa,
            'descripcion' => $request->descripcion
        ]);

        session()->flash('success', "Datos guardados exitosamente");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $this->validate($request, [
            'nombre_empresa' => 'required|string|max:100',
            'descripcion'
        ]);

        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->descripcion = $request->descripcion;
        $empresa->update();

        session()->flash('success', "Datos actualizados con éxito");

        //return redirect()->back();
         return redirect(route('empresa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        if($empresa->producto->count() > 0){
            session()->flash('error', "empresa : $empresa->nombre_empresa no se puede eliminar porque el producto total es más de 0");
        }else{
            $empresa->delete();
            session()->flash('success', "empresa : $empresa->nombre_empresa Eliminado exitosamente");
        }

        return redirect(route('empresa.index'));
    }
}
