<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneroController extends Controller
{
    
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $genero = genero::latest();

        if (!empty($request->keyword)) {
            $genero = $genero->where('nombre_genero','like',"%".$request->keyword."%");
        }
        
        return view('genero.index')->with('genero', $genero->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        return view('genero.create');
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
            'nombre_genero' => 'required|string|max:100'
        ]);

        $genero = genero::create(['nombre_genero' => $request->nombre_genero]);

        session()->flash('success', "Datos guardados exitosamente");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(genero $genero)
    {
        return view('genero.edit')->with('genero', $genero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, genero $genero)
    {
        $this->validate($request, [
            'nombre_genero' => 'required|string|max:100'
        ]);

        $genero->nombre_genero = $request->nombre_genero;

        $genero->update();

        session()->flash('success', "Datos actualizados con éxito");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(genero $genero)
    {
        if($genero->producto->count() > 0){
            session()->flash('error', "genero : $genero->nombre_genero no se puede eliminar porque el producto total es más de 0");
        }else{
            $genero->delete();
            session()->flash('success', "genero : $genero->nombre_genero Eliminado exitosamente");
        }

        return redirect(route('genero.index'));
    }











}
