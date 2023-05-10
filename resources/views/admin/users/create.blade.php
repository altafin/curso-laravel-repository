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
            @include('admin.includes.alerts')
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @include('admin.categories._partials.form')
            </form>
        </div>
    </div>
@stop
