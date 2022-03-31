@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión Tipo de Cliente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tipocliente.index') }}">tipocliente</a></li>
                        <li class="breadcrumb-item active">Crear</li>
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
                            <a href="{{ route('tipocliente.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Agregar Tipo Cliente</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <form method="POST" action="{{ route('tipocliente.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nombre_tipocliente">Nombre</label>
                                        <input type="text" name="nombre_tipocliente" class="form-control @error('nombre_tipocliente') is-invalid @enderror"  id="nombre_tipocliente" value="{{ old('nombre_tipocliente') }}"  placeholder="Ingrese el nombre del tipo de cliente" autofocus>
                                        @error('nombre_tipocliente')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                         @error('descripcion')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                      @enderror
                                   
                                    </div>
                                    {{-- <hr> --}}
                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('tipocliente.index') }}">cancelar</a>
                                        <button type="submit" class="btn btn-primary ml-2">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
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
