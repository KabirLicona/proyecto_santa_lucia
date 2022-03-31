<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarteraController extends Controller
{
    //
    public function cartera($nombre){
        return view('cartera.indexcartera', compact('nombre'));
    }
}
