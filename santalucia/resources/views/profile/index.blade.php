@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('/img/profile.png') }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->nombre }}</h3>

                        <p class="text-muted text-center">{{ $user->roles[0]->nombre }}</p>

                        {{-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Seguir</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Siguiente</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Amigos</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Perfil</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane active" id="profile">
                                <form class="form-horizontal" action="{{ route('profile.update', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('stok') is-invalid @enderror" id="inputName" placeholder="Name">
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('stok') is-invalid @enderror" id="inputEmail"
                                                placeholder="Email">
                                                @error('email')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Cambia la contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputName2" placeholder="Déjelo en blanco si no desea cambiar la contraseña">
                                            @error('password')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Confirmar contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputName2" placeholder="">
                                            @error('password_confirmacion')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });

</script>
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
