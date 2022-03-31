<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //
    public function factura($nombre){
        return view('factura.indexfactura', compact('nombre'));
}
}