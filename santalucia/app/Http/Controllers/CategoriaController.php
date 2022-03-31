<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categoria = Categoria::latest();

        if (!empty($request->keyword)) {
            $categoria = $categoria->where('nombre_categoria','like',"%".$request->keyword."%");
        }
        
        return view('categoria.index')->with('categoria', $categoria->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        return view('categoria.create');
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
            'nombre_categoria' => 'required|string|max:100'
        ]);

        $categoria = Categoria::create(['nombre_categoria' => $request->nombre_categoria]);

        session()->flash('success', "Datos guardados exitosamente");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $this->validate($request, [
            'nombre_categoria' => 'required|string|max:100'
        ]);

        $categoria->nombre_categoria = $request->nombre_categoria;

        $categoria->update();

        session()->flash('success', "Datos actualizados con éxito");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        if($categoria->producto->count() > 0){
            session()->flash('error', "categoria : $categoria->nombre_categoria no se puede eliminar porque el producto total es más de 0");
        }else{
            $categoria->delete();
            session()->flash('success', "categoria : $categoria->nombre_categoria Eliminado exitosamente");
        }

        return redirect(route('categoria.index'));
    }
}
