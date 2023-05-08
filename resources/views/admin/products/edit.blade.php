@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Editar Produto: {{ $product->name }}</h1>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.edit', $product->id) }}" class="active">Editar</a></li>
            </li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="form">
                @method('PUT')
                @include('admin.products._partials.form')
            </form>
        </div>
    </div>
@stop
