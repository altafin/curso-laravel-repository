@extends('adminlte::page')

@section('title', 'Listagem de Produtos')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Produtos</h1>
        </div>
        <div class="col-2" style="text-align: right;">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
            </li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filtro" placeholder="Filtro:" class="form-control">
                <button type="submit">Pesquisar</button>
            </form>
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th width="150">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td style="width: 10px;">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
