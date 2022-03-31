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
                    <h1>CARTERA</h1>
                    </div>
                     <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">CARTERA</li>
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
                                 AQUI ES LA PARTE INTERMEDIA DONDE ESTA LA FLECHA
                             ============================================================*/-->
                    
                    
                        <div class=" d-flex align-items-center justify-content-between">
                            <a href="{{ route('categoria.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Editar Cartera</span>
                        </div>


         <!-- /*==========================================================
                                 AQUI EMPIEZA LA TABLA
                             ============================================================*/-->


                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered">
                                <thead>
                                <tr class="table-info">
      <th scope="row" _msthash="2596100" _msttexthash="207493">#Cartera</th>
      <td _msthash="2595814" _msttexthash="451594"> Empresa</td>
      <td _msthash="2595944" _msttexthash="451594"> Cliente</td>
      <td _msthash="2596074" _msttexthash="451594"> Factura</td>
      <td _msthash="2596074" _msttexthash="451594"> Fecha Fac.</td>
      <td _msthash="2596074" _msttexthash="451594"> Credito.</td>
      <td _msthash="2596074" _msttexthash="451594"> Monto Fac.</td>
      <td _msthash="2596074" _msttexthash="451594"> Valor Acu.</td>
      <td _msthash="2596074" _msttexthash="451594"> Saldo</td>
      <td _msthash="2596074" _msttexthash="451594"> Fecha Exp.</td>
      <td _msthash="2596074" _msttexthash="451594"> Estado</td>
      <td _msthash="2596074" _msttexthash="451594"> Observacion</td>
    </tr>
                                </thead>
                                <tbody>
                                
                                <tr class="text-center"> 
                                <th> 1 </th>
                                <th> RadioShark</th>
                                <th> Hector Lopez</th>
                                <th> FAC-945</th>
                                <th> 15/01/22</th>
                                <th> CRT-1100</th>
                                <th> 4,500</th>
                                <th> 1,500 </th>
                                <th> 3,000</th>
                                <th> 31/03/22</th>
                                <th> <span class="badge bg-success" _msthash="1060800" _msttexthash="74009">Activo</span></th>
                                <th> nueva configuracion</th>
                                </tr>

                                <tr class="text-center"> 
                                <th> 2 </th>
                                <th> RadioShark</th>
                                <th> Sindy Sanchez</th>
                                <th> FAC-945</th>
                                <th> 15/01/22</th>
                                <th> CRT-1100</th>
                                <th> 4,500</th>
                                <th> 1,500 </th>
                                <th> 3,000</th>
                                <th> 31/03/22</th>
                                <th> <span class="badge bg-danger" _msthash="1060956" _msttexthash="95342">Mora</span> </th>
                                <th> nueva configuracion</th>
                                </tr>
                                
                                <tr class="text-center"> 
                                <th> 3 </th>
                                <th> RadioShark</th>
                                <th> Sindy Sanchez</th>
                                <th> FAC-945</th>
                                <th> 15/01/22</th>
                                <th> CRT-1100</th>
                                <th> 4,500</th>
                                <th> 1,500 </th>
                                <th> 3,000</th>
                                <th> 31/03/22</th>
                                <th> <span class="badge bg-warning" _msthash="1061112" _msttexthash="177320">Inactivo</span> </th>
                                <th> nueva configuracion</th>
                                </tr>

                                </tbody>
                            </table>
                            
                        </div>


<!-- /*==========================================================
                                 AQUI TERMINA LA TABLA
                             ============================================================*/-->



<!-- /*==========================================================
                                 NO SE PARA QUE SIRVE
                             ============================================================*/-->



                    


                                    <!-- /*==========================================================
                                 AQUI ESTAN LOS BOTONERS
                             ============================================================*/-->

                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('categoria.index') }}">Iditar</a>
                                        <button type="submit" class="btn btn-primary ml-2">Agregar</button>
                                    </div>
                                 <!-- /*==========================================================
                                 AQUI TERMINAN LOS BONES
                             ============================================================*/-->

                            </div>

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