<?php
	/*=============================================
	               INSTRUCCIONES
    CREAMOS EL key:generate cada vez que deseamos abrir la aplicacion por
    primera vez en una maquina, despues no es necesario generarlo.
       Codigo=  php artisan key:generate
    
    MIGRAMOS LAS BASES DE DATOS A MYSQL (LAS BD SE DEBE CREAR 
    POR MEDIO DE LARAVEL NO DIRECTAMENTE EN MYSQL)
       Codigo= php artisan migrate --seed 

    PARA EJECUTAR EL SERVIDOR WEB EJECUTAMOS EN CMD.
       Codigo= php artisan serve



            DB => Control => Modelo => Vista => routes.
    1. PRIMER PASO CREAMOS LAS ESTRUCTURA DE LA TABLA CON CODIGO
       database => migrations
       php artisan make:migration create _table
    
    
    2. CREAR LOS CONTROLES (CREARLOS CON CODIGO)
       app => Http => Controllers
       Codigo= php artisan make:controller TablaController)


    3. CREAMOS EL MODELO
       app => Http
       Copiamos un modelo existente y modificamos de acuerdo al control
    

    4. CREAMOS LA VISTA
       resources => views => ¿carpeta segun tabla?
       Cremos la vista segun los datos que necesitamos. copiamos los 
       tres archivos create,edit,index y lo modificamos segun la necesidad.

    5. ROUTEAMOS LA VISTA PARA QUE SE VEA EN LA WEB.   
       routers => web
       En el archivo web.php estan las rutas de las paginas que se ven en la web.
       En resources => layouts => partials 
       se encuenta el BarMenu, en el se agregan las rutas de acceso del menu.
	=============================================*/