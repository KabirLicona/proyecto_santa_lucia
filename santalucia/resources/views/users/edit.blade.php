@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active">Editar usuario</li>
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
                            <a href="{{ route('users.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            <span>Editar usuario</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <form method="POST" action="{{ route('users.update',$user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}"  placeholder="Ingrese el nombre de la categoría" autofocus>
                                        @error('name')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}"  placeholder="email">
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}"  placeholder="Déjelo en blanco si no desea cambiar su contraseña!">
                                        @error('password')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}"  placeholder="Confirmar Contraseña">
                                        @error('password_confirmation')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">-Seleccionar Rol-</option>
                                            @foreach ($roles as $item)
                                            <option value="{{ $item->name  }}"
                                                    @if ($item->name === $user->roles[0]->name)
                                                        selected
                                                    @endif    
                                                >
                                                
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">-Seleccionar estado-</option>
                                            <option value="1" 
                                                @if ($user->status)
                                                    selected
                                                @endif  
                                            >Activo</option>
                                            <option value="0" 
                                                @if (!$user->status)
                                                    selected
                                                @endif  
                                            >Inactivo</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group d-flex justify-content-end">
                                        <a class="btn btn-default " href="{{ route('users.index') }}">Cancelar</a>
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
