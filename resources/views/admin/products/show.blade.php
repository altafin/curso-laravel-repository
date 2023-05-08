@extends('adminlte::page')

@section('title', "Detalhes do Produto: {{ $product->name }}")

@section('content_header')
    <div class="row">
        <h1>Detalhes do Produto: {{ $product->name }}</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.show', $product->id) }}">Detalhes</a></li>
        </li>
    </ol>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <p><strong>ID: </strong>{{ $product->id }}</p>
            <p><strong>Nome: </strong>{{ $product->name }}</p>
            <p><strong>Categoria: </strong>{{ $product->category->title }}</p>
            <p><strong>Preço: </strong>{{ $product->price }}</p>
            <p><strong>URL: </strong>{{ $product->url }}</p>
            <p><strong>Descrição: </strong>{{ $product->description }}</p>
            <hr>
            <form action="{{ route('products.destroy', $product->id) }}" class="form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@stop
