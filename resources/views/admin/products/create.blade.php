@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Cadastrar Novo Produto</h1>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>
            </li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{ route('products.store') }}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="url" placeholder="URL" class="form-control">
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-control">
                        <option value="">Escolha</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@stop
