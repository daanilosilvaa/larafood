@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}" class="active">{{ $user->name}}</a></li>

</ol>
    <h1>Detalhes do Usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">    
            <ul>
                <li>
                    <strong>Nome:</strong>{{$user->name}}
                </li>
                <li>
                    <strong>Email:</strong>{{$user->email}}
                </li>
                <li>
                    <strong>Empresa:</strong>{{$user->tenant->name}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('users.destroy', $user->id) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{$user->name}} </button>
            </form>

        </div>
    </div>
@endsection