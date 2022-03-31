<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditosController extends Controller
{
    //
    public function Prueba_controller($nombre){
        return view('credito.indexcredito', compact('nombre'));
    }
}
