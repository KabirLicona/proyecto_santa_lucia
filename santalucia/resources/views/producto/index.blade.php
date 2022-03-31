@extends('layouts.master') <!-- LLAMADO EL ESTILO ADMINLTE DEL ARCHIVO layouts.master-->


<!--/*==========================================================
    CONTENIDO DEL FORMULARIO.
============================================================*/-->


@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Datos Producto</li>
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
                                <i class="fas fa-user-plus    "></i>



                                Crear Productos

                                
                           <!-- /*==========================================================
                                 MOSTRAMOS LOS BOTONES DE IMPORTAR, PDF, EXPORTAR.
                             ============================================================*/ -->
                            </a>
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
                                        <th>No</th>
                                        <th>Imagen</th>
                                        <th>Nombre producto</th>
                                        <th>Categoria</th>
                                        <th>Stok</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($producto as $row)
                                        <tr>
                                            <td style="width: 20px">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v    "></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('producto.edit', $row->id) }}">
                                                                <i class="fas fa-edit    "></i>
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="handleDelete ({{ $row->id }})">
                                                                <i class="fas fa-trash    "></i>
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td style="width: 50px" class="text-center">{{ $loop->iteration + $producto->firstItem() - 1 }}</td>
                                            <td class="text-center">
                                                <a href="{{asset('/img/imagen').'/'.$row->imagen}}" data-fancybox data-caption="{{ $row->nombre_producto}}">
                                                    <img width="64px" height="64px" src="{{asset('/img/imagen').'/'. $row->imagen}}" alt="">
                                                </a>
                                            </td>
                                            <td>{{$row->nombre_producto }}</td>
                                            <td>{{$row->categoria->nombre_categoria }}</td>
                                            <td class="text-center">{{$row->stok }}</td>
                                            <td class="text-right">Lps. {{number_format($row->precio_compra) }}</td>
                                            <td class="text-right">Lps. {{number_format($row->precio_venta) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No hay datos</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                            {{ $producto->appends(['keyword' => request()->query('keyword')])->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <span class="text-sm float-right">Total Entradas: {{$producto->total()}}</span>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>


                         <!-- /*==========================================================
                                 VISTA PARA LLAMAR EL REGISTRO Y ELIMINARLO.
                             ============================================================*/-->
<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mt-3">¿Está seguro de que elimina los datos del producto? </p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Volver</button>
                    <button type="submit" class="btn btn-danger">Si, Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>




                      <!-- /*==========================================================
                                 LLAMAMOS RL FORMULARIO Y LA FUNCION PARA IMPORTAR DATOS.
                             ============================================================*/-->
<!-- Modal Import File-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Import Datos productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('producto.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="import_producto">Import File</label>
                      <input type="file" class="form-control-file" name="import_producto" id="import_producto" placeholder="" aria-describedby="fileHelpId" required>
                      <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                      <small id="fileHelpId" class="form-text text-muted">Asegúrese de que el archivo cargado coincida con el formato. <br> <a href="{{ url('template/producto_template.xlsx') }}">Descargar formato de archivo de muestra   xlsx <i class="fas fa-download ml-1   "></i></a></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                {{-- <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                {{-- </form> --}}
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./producto/${id}`
        console.log(form)
        $('#deleteModal').modal('show')
    }

</script>

@error('import_producto')
    {{-- <div class="text-danger small mt-1">{{ $message }}</div> --}}
    <script>
        $(document).ready(function () {
            toastr["error"]('{{ $message }}')
        });
    </script>
@enderror

@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr["success"]('{{ session()->get('success') }}')
        });

    </script>
@endif

@if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });

    </script>
@endif

@endsection
