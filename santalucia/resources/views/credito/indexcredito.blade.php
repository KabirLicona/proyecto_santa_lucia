@extends('layouts.master')

@section('content_header')



    
@stop

@section('content')



<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CREDITOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Creditos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                        <a href="{{ route('producto.create') }}" class="btn btn-primary">
                                <i class="fas fa-duotone fa-book    "></i>



                                Nuevo Credito
                                </a>
                                
                           <!-- /*==========================================================
                                 MOSTRAMOS LOS BOTONES DE IMPORTAR, PDF, EXPORTAR.
                             ============================================================*/ -->
                            
                            <div class="">
                                <a href="" class="btn btn-default btn-flat " data-toggle="modal" data-target="#importModal" title="Import File">
                                    <i class="fas fa-file-import    "></i>
                                </a>
                                <a href="{{ route('producto.pdf') }}" target="blank" class="btn btn-default btn-flat" title="Crear PDF">
                                    <i class="fas fa-file-pdf    "></i>
                                </a>
                                <a href="{{ route('producto.export') }}" class="btn btn-default btn-flat" title="Export Excel">
                                    <i class="fas fa-file-excel    "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        


                    
                          <!-- /*==========================================================
                                 VISTA MOSTRAMOS LAS COLUMNAS CON NOMBRE EN EL FORMULARIO.
                             ============================================================*/-->
                        <form action="{{ route('producto.index') }}" method="GET">
                            {{-- @csrf --}}
                            <div class="input-group input-group mb-3 float-right" style="width: 250px;">
                                <input type="text" name="keyword" class="form-control float-right"
                                placeholder="Search" value="{{request()->query('keyword')}}">
    
                                
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <a href="{{ route('producto.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch    "></i></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                    <th>#</th>
                                    <th>Tipo de credito </th>
                                    <th>Dias del credito</th>
                                    <th>Descripcion</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>1</th>
                                    <th>Credito por lentes de sol</th>
                                    <th>Mediano plazo</th>
                                    
                                    </tr>

                                    <tr class="text-center">
                                    <th>#</th>
                                    <th>2</th>
                                    <th>Credito por aros </th>
                                    <th>Corto plazo</th>
                                    
                                    </tr>
    
                                </tbody>
                            </table>
                            <!-- /*==========================================================
                                 AQUI ESTAN LOS BOTONES
                             ============================================================*/-->

                             <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('categoria.index') }}">Iditar</a>
                                        <button type="submit" class="btn btn-primary ml-2">Eliminar</button>
                                    </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <span class="text-sm float-right">Total Entradas:</span>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

 


    
@stop

@section('css')
   
@stop

@section('js')
    
@stop



