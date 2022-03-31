@extends('layouts.master')

@section('content')


 <!-- /*==========================================================
                                 AQUI EMPIEZA EL CONTENEDOR O LA CLASE CONTAINER
                             ============================================================*/-->
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FACTURACION</h1>
                    </div>
                     <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Facturas</li>
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


         <!-- /*==========================================================
                                 AQUI EMPIEZA LA TABLA
                             ============================================================*/-->


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
                                  <th>Codigo</th>
                                  <th>Numero</th>
                                  <th>Termino</th>
                                  <th>Unidades</th>
                                  <th>Precio</th>
                                  <th>Monto</th>
                                  <th>Estado</th>
                                  <th>Fecha</th>
                                  <th>Cliente</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 
                              <tr class="text-center">
                                  <th>#</th>
                                  <th>FCT-10001</th>
                                  <th>28</th>
                                  <th>Por lentes de sol </th>
                                  <th>2</th>
                                  <th>800</th>
                                  <th>1000</th>
                                  <th>Activo</th>
                                  <th>24/12/21</th>
                                  <th>Macoto</th>
                                  </tr>

                                  <tr class="text-center">
                                  <th>#</th>
                                  <th>FCT-901</th>
                                  <th>88</th>
                                  <th>Por examene de vista </th>
                                  <th>1</th>
                                  <th>1200</th>
                                  <th>1500</th>
                                  <th>Activo</th>
                                  <th>16/09/21</th>
                                  <th>Perez</th>
                                  </tr>
  
                              </tbody>
                          </table>
                          <!-- /*==========================================================
                               AQUI ESTAN LOS BOTONERS
                           ============================================================*/-->

                           <div class="form-group d-flex justify-content-end">
                                      <a class="btn btn-default " href="{{ route('categoria.index') }}">Iditar</a>
                                      <button type="submit" class="btn btn-primary ml-2">Eliminar</button>
                                  </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                               
                                    
                                   

                        </div>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        tes
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
    @if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr["success"]('{{ session()->get('success') }}')
        });

    </script>
    @endif
@endsection