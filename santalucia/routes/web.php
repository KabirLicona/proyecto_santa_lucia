<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estos
| RouteServiceProvider carga las rutas dentro de un grupo que
| contiene el grupo de middleware "web".
|
*/

Route::get('/', function() {
    return redirect(route('login'));
});
//ESTA ES UNA RUTA CON EL NOMBRE USUARIOS Y TIENE UNA FUNCION NO DEFINIDA Y RETORNA O RETURN ESTA RUTA ES DE
//ESTA RUTA ES PARA DE CREDITOS LA VISTA COMO TAL//
Route::get('creditos/{nombre}','CreditosController@Prueba_controller');
//Route::get('usuarios {$nombre}',[CreditosController::class,'Prueba_controller']); no se porque no funciona//


//ESTA RUTA ES PARA LA FACTURA LA VISTA COMO TAL//
Route::get('factura/{nombre}','FacturaController@factura');

//ESTA RUTA ES PARA LA CARTERA LA VISTA COMO TAL//
Route::get('cartera/{nombre}','CarteraController@cartera');

Auth::routes(['register' => false]);




Route::group(['middleware' => 'auth'], function(){
    
    //settings
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('setting', 'SettingController');        
    });

    
    
    Route::group(['middleware' => ['permission:gestion usuarios|gestion roles']], function() {
        Route::get('/roles/search','RoleController@search')->name('roles.search');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        // Route::resource('setting', 'SettingController');        
    });

    // Producto
    Route::group(['middleware' => ['permission:gestion producto']], function() {
        Route::get('/producto/search','ProductoController@search')->name('producto.search');
        Route::get('/producto/pdf','ProductoController@reportPdf')->name('producto.pdf');
        Route::get('/producto/export/', 'ProductoController@export')->name('producto.export');
        Route::post('/producto/import/', 'ProductoController@import')->name('producto.import');
        Route::resource('producto', 'ProductoController');        
    });

    // Categoria
    Route::group(['middleware' => ['permission:gestion categoria']], function() {         
        Route::resource('categoria', 'CategoriaController');         
    });


    // Clientes
    Route::group(['middleware' => ['permission:gestion cliente']], function() {
        Route::get('/cliente/search','ClienteController@search')->name('cliente.search');
        Route::get('/cliente/pdf','ClienteController@reportPdf')->name('cliente.pdf');
        Route::get('/cliente/export/', 'ClienteController@export')->name('cliente.export');
        Route::post('/cliente/import/', 'ClienteController@import')->name('cliente.import');
        Route::resource('cliente', 'ClienteController');        
    });

    // Empresa
    Route::group(['middleware' => ['permission:gestion empresa']], function() {         
        Route::resource('empresa', 'EmpresaController');         
    });

     // Genero
     Route::group(['middleware' => ['permission:gestion Genero']], function() {         
        Route::resource('empresa', 'GeneroController');         
    });

    // Tipo_Cliente
    Route::group(['middleware' => ['permission:gestion tipocliente']], function() {         
    Route::resource('tipocliente', 'TipoclienteController');         
    });
    
    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');

    // Creditos
    

  
   






});

