@extends('layouts.master')

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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('producto.index') }}">producto</a></li>
                        <li class="breadcrumb-item active">Editar Producto</li>
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
                        <div class=" d-flex align-items-center justify-content-between">
                            
                            <a href="{{ route('producto.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Editar producto</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('producto.update', $producto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5 px-5">
                                    <div class="form-group">
                                        <label for="imagen">imagen producto</label>
                                        <input type="file" class="form-control logo @error('imagen') is-invalid @enderror" name="imagen" id="imagen" value="{{ old('imagen') }}" data-default-file="{{ asset('/img/imagen/'.$producto->imagen) }}"  data-height="282">
                                        @error('imagen')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col-md -->

                                <div class="col-md-5 px-3">
                                    <div class="form-group">
                                        <label for="nombre_producto">Nombre producto</label>
                                        <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" id="nombre_producto" value="{{ $producto->nombre_producto }}"  placeholder="nombre_producto" autofocus>
                                        @error('nombre_producto')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="categoria_id">categoria</label>
                                        <select name="categoria_id" id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                                            <option value="">-Seleccionar categoria-</option>
                                            @foreach ($categoria as $item)
                                            <option value="{{ $item->id  }}"
                                                    @if ($item->id == $producto->categoria_id)
                                                        selected
                                                    @endif    
                                                >
                                                
                                                {{ $item->nombre_categoria }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="precio_compra">precio compra</label>
                                        <input type="text" class="form-control @error('precio_compra') is-invalid @enderror" name="precio_compra" id="precio_compra" value="{{ $producto->precio_compra }}"  placeholder="precio_compra">
                                        @error('precio_compra')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="precio_venta">Precio venta</label>
                                        <input type="text" class="form-control @error('precio_venta') is-invalid @enderror" name="precio_venta" id="precio_venta" value="{{ $producto->precio_venta }}"  placeholder="precio_venta">
                                        @error('precio_venta')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" value="{{ $producto->stok }}"  placeholder="stok">
                                        @error('stok')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">producto descripcion</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
                                        @error('descripcion')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('users.index') }}">Cancelar</a>
                                        <button type="submit" class="btn btn-primary ml-2">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                                <!-- /.col-md -->
                                <div class="col-md-1"></div>
                            </div>
                        </form>
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
<script>
    
        $(document).ready(function () {
            $('#categoria_id').select2()

            $('.logo').dropify({
                messages: {
                    'default': '',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

        });

</script>



@endsection
