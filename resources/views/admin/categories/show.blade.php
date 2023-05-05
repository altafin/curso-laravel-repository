@extends('adminlte::page')

@section('title', "Detalhes da Categoria: {{ $category->title }}")

@section('content_header')
    <div class="row">
        <h1>Detalhes da Categoria: {{ $category->title }}</h1>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <p><strong>ID: </strong>{{ $category->id }}</p>
            <p><strong>Title: </strong>{{ $category->title }}</p>
            <p><strong>URL: </strong>{{ $category->url }}</p>
            <p><strong>Descrição: </strong>{{ $category->description }}</p>
            <hr>
            <button type="submit" class="btn btn-danger">Deletar</button>
        </div>
    </div>
@stop
