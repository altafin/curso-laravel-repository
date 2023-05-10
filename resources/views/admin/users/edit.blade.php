@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <div class="row">
        <h1>Editar Categoria: {{ $category->title }}</h1>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.categories._partials.form')
            </form>
        </div>
    </div>
@stop
