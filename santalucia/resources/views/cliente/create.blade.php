@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">cliente</a></li>
                        <li class="breadcrumb-item active">Crear cliente</li>
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
                            
                            <a href="{{ route('cliente.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Agregar cliente</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('cliente.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-5">
                                <div class="form-group">
                                    <label for="imagen">clientes</label>
                                    <input type="file" class="form-control logo @error('imagen') is-invalid @enderror" name="imagen" id="imagen" value="{{ old('imagen') }}" data-default-file="{{ old('imagen') }}"  data-height="282">
                                    @error('imagen')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.col-md -->

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nombre_cliente">Nombre cliente</label>
                                    <input type="text" class="form-control @error('nombre_cliente') is-invalid @enderror" name="nombre_cliente" id="nombre_cliente" value="{{ old('nombre_cliente') }}"  placeholder="nombre_cliente" autofocus>
                                    @error('nombre_cliente')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <textarea class="form-control @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="3">{{ old('direccion') }}</textarea>
                                    @error('direccion')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                      @enderror


                                      <div class="form-group">
                                    <label for="telefono">telefono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ old('telefono') }}"  placeholder="telefono" autofocus>
                                    @error('telefono')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                      @enderror

                                      <div class="form-group">
                                    <label for="celular">celular</label>
                                    <input type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" id="celular" value="{{ old('celular') }}"  placeholder="celular" autofocus>
                                    @error('celular')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                      @enderror
                                      </div>

                                      
                                <div class="form-group">
                                    <label for="empresa_id">empresa</label>
                                    <select name="empresa_id" id="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror">
                                        <option value="">-Seleccionar empresa-</option>
                                        @foreach ($empresa as $item)
                                        <option value="{{ $item->id  }}"
                                                @if ($item->id == old('empresa_id'))
                                                    selected
                                                @endif    
                                            >
                                            
                                            {{ $item->nombre_empresa }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('empresa_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="correo">correo</label>
                                    <input type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" id="correo" value="{{ old('correo') }}"  placeholder="correo" autofocus>
                                    @error('correo')
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
                        <div class="row">
                            <div class="col-12">
                                


                            </div>
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
            $('#empresa_id').select2()

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
