<?php

namespace App\Http\Controllers;

use App\Tipocliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoclienteController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipocliente = Tipocliente::latest();

        if (!empty($request->keyword)) {
            $tipocliente = $tipocliente->where('nombre_tipocliente','like',"%".$request->keyword."%");
        }
        
        return view('tipocliente.index')->with('tipocliente', $tipocliente->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        return view('tipocliente.create');
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
            'nombre_tipocliente' => 'required|string|max:100'
        ]);

        $tipocliente = Tipocliente::create([
            'nombre_tipocliente' => $request->nombre_tipocliente,
            'descripcion' => $request->descripcion
        ]);

        session()->flash('success', "Datos guardados exitosamente");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipocliente  $tipocliente
     * @return \Illuminate\Http\Response
     */
    public function show(Tipocliente $tipocliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipocliente  $tipocliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipocliente $tipocliente)
    {
        return view('tipocliente.edit')->with('tipocliente', $tipocliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipocliente  $tipocliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipocliente $tipocliente)
    {
        $this->validate($request, [
            'nombre_tipocliente' => 'required|string|max:100',
            'descripcion'
        ]);

        $tipocliente->nombre_tipocliente = $request->nombre_tipocliente;
        $tipocliente->descripcion = $request->descripcion;

        $tipocliente->update();

        session()->flash('success', "Datos actualizados con éxito");

        //return redirect()->back();
        return redirect(route('tipocliente.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipocliente  $tipocliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipocliente $tipocliente)
    {
        if($tipocliente->tipocliente->count() > 0){
            session()->flash('error', "tipocliente : $tipocliente->nombre_tipocliente no se puede eliminar porque el tipo total es más de 0");
        }else{
            $tipocliente->delete();
            session()->flash('success', "tipocliente : $tipocliente->nombre_tipocliente Eliminado exitosamente");
        }

        return redirect(route('tipocliente.index'));
    }
}
