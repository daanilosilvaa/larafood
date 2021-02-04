@extends('adminlte::page')

@section('title', "Detalhes da Permissão $permission")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('permissions.index') }}">Permissãos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('permissions.show', $permission->id) }}" class="active">{{ $permission->name}}</a></li>

</ol>
    <h1>Detalhes da Permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">    
            <ul>
                <li>
                    <strong>Nome:</strong>{{$permission->name}}
                </li>
                <li>
                    <strong>Descrição:</strong>{{$permission->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', $permission->id) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{$permission->name}} </button>
            </form>

        </div>
    </div>
@endsection