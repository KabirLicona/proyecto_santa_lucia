@extends('layouts.master')

                       <!-- Datos que se visualizan en el formulario Dashboard -->


@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



                     <!-- mostramos el total de clientes en el Dashboard -->
    <!-- Main content -->
    <section class="content">
    
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $cliente->total() }}</h3>

                        <p>Total clientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('cliente.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


                        <!-- mostramos el total de roles en el Dashboard -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $rolesCount }}</h3>

                        <p>Roles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users-cog    "></i>
                    </div>
                    <a href="{{ route('roles.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



                       <!-- mostramos el total de usuarios en el Dashboard -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>

                        <p>Total Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                             <!-- mostramos el dato de visitas en el Dashboard -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Visitantes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>


          <!-- llamamos los registro de clientes de la BD y los mostramos en un cuadro en el Dashboard -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Clientes</h3>

                        <div class="card-tools small">
                            <a href="{{ route('cliente.index') }}">Gestion de Clientes</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente as $row)
                                    <tr>
                                    <td>{{$row->nombre_cliente }}</td>
                                            <td>{{$row->telefono}}</td>
                                            <td>{{$row->celular}}</td>
                                            <td>{{$row->empresa->nombre_empresa }}</td>
                                            <td>{{$row->correo}}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>


            <!-- llamamos los registro de usuarios de la BD y los mostramos en un cuadro en el Dashboard -->

            <!-- /.col-md -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>

                        <div class="card-tools small">
                            <a href="{{ route('users.index') }}">Gestion de Usuarios</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->roles[0]->name }}</td>
                                        <td>{{ ($row->status) ? 'Activo' : 'Inactivo' }}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
