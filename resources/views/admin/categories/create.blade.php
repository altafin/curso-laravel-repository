@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    <div class="row">
        <h1>Cadastrar Nova Categoria</h1>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Título">
                </div>
                <div class="form-group">
                    <input type="text" name="url" class="form-control" placeholder="URL">
                </div>
                <div class="form-group">
                    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
@stop
