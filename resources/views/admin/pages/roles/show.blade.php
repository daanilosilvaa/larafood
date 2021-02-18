@extends('adminlte::page')

@section('title', "Detalhes do Cargo $role")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Cargos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('roles.show', $role->id) }}" class="active">{{ $role->name}}</a></li>

</ol>
    <h1>Detalhes do Cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">    
            <ul>
                <li>
                    <strong>Nome: </strong>{{$role->name}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$role->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('roles.destroy', $role->id) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{$role->name}} </button>
            </form>

        </div>
    </div>
@endsection