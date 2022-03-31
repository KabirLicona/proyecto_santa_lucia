@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión por Empresa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('empresa.index') }}">empresa</a></li>
                        <li class="breadcrumb-item active">Editar Empresa</li>
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
                            <a href="{{ route('empresa.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Editar Empresa</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nombre_empresa">Nombre empresa</label>
                                        <input type="text" name="nombre_empresa" class="form-control @error('nombre_empresa') is-invalid @enderror"  id="nombre_empresa" value="{{ $empresa->nombre_empresa }}"  placeholder="Ingresar nombre empresa" autofocus>
                                        @error('nombre_empresa')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                        <label for="descripcion">descripcion</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3">{{ $empresa->descripcion }}</textarea>
                                        @error('descripcion')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    {{-- <hr> --}}
                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('empresa.index') }}">Cancelar</a>
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
