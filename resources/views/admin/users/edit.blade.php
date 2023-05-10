@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <div class="row">
        <h1>Editar Usuário: {{ $user->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.users._partials.form')
            </form>
        </div>
    </div>
@stop
