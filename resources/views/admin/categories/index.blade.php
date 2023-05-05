@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Categorias</h1>
        </div>
        <div class="col-2" style="text-align: right;">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
{{--            <button type="button" class="btn btn-primary">Nova Categoria</button>--}}
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" class="form form-inline">
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td style="width: 10px;">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
