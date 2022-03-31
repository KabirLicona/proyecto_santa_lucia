<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Cliente;
use App\User;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $producto = Producto::inRandomOrder()->paginate(10);
        $cliente = Cliente::inRandomOrder()->paginate(10);
        $users = User::all();
        $rolesCount = Role::count();
        
        return view('home', compact('producto','cliente', 'users', 'rolesCount'));
    }
}
