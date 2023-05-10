@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <div class="row">
        <h1>Cadastrar Novo Usuário</h1>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @include('admin.users._partials.form')
            </form>
        </div>
    </div>
@stop
