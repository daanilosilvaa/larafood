@extends('adminlte::page')

@section('title', "Detalhes do Estado $state")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('states.index') }}">Estados</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('states.show', $state->id) }}" class="active">{{ $state->name}}</a></li>

</ol>
    <h1>Detalhes do Estado <b>{{ $state->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $state->name }}
                </li>
                <li>
                    <strong>Sigla:</strong> {{ $state->initials }}
                </li>
                <li>
                    <strong>Status:</strong> {{ $state->active == '0' ? 'Inativo' : 'Ativo' }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('states.destroy', $state->id) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{$state->name}} </button>
            </form>

        </div>
    </div>
@endsection
