@extends('adminlte::page')

@section('title', "Detalhes da Categoria: {{ $category->title }}")

@section('content_header')
    <div class="row">
        <h1>Detalhes da Categoria: {{ $category->title }}</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.show', $category->id) }}">Detalhes</a></li>
        </li>
    </ol>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <p><strong>ID: </strong>{{ $category->id }}</p>
            <p><strong>Title: </strong>{{ $category->title }}</p>
            <p><strong>URL: </strong>{{ $category->url }}</p>
            <p><strong>Descrição: </strong>{{ $category->description }}</p>
            <hr>
            <form action="{{ route('categories.destroy', $category->id) }}" class="form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@stop
