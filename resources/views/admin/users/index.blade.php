@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Usuários</h1>
        </div>
        <div class="col-2" style="text-align: right;">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
{{--            <button type="button" class="btn btn-primary">Nova Categoria</button>--}}
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
            </li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Pesquisar" class="form-control">
                <input type="text" name="title" placeholder="Título" class="form-control" value="{{ $data['title'] ?? '' }}">
                <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
                <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
            @if (isset($data))
                <a href="{{ route('users.index') }}">(X) Limpar Resultados da Pesquisa</a>
            @endif
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width: 10px;">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($data))
                {!! $users->appends($data)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
@stop
