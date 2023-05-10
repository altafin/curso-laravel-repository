@extends('adminlte::page')

@section('title', "Detalhes do Usuário: {{ $user->name }}")

@section('content_header')
    <div class="row">
        <h1>Detalhes do Usuário: {{ $user->name }}</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}">Detalhes</a></li>
        </li>
    </ol>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <p><strong>ID: </strong>{{ $user->id }}</p>
            <p><strong>Nome: </strong>{{ $user->name }}</p>
            <p><strong>E-mail: </strong>{{ $user->email }}</p>
            <hr>
            <form action="{{ route('users.destroy', $user->id) }}" class="form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@stop
