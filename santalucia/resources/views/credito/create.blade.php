@extends('layouts.master')

@section('content_header')



    
@stop

@section('content')

<section class="content">
    <div class= "container-fluid">
        <form action="{{route('credito.create'}}" method="POST">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label>Tipo de credito </label>
                    <<input class="form-control" type="text" name="Tipo_credito"id=Tipo de credito>
                </div>

@endsection

@stop

@section('css')
   
@stop

@section('js')
    
@stop