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
            {{ Form::open(['route' => 'products.store', 'class' => 'form']) }}
            @include('admin.products._partials.form')
            {{ Form::close() }}
{{--            <form action="{{ route('products.store') }}" method="POST" class="form">--}}
{{--                @include('admin.products._partials.form')--}}
{{--            </form>--}}
        </div>
    </div>
@stop
