@extends('adminlte::page')

@section('title', "Detalhes da cidade {$city->name} do Estado {$state->name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('states.index') }}">Estados</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('states.show', $state->id) }}" class="active">{{ $state->name}}</a></li>

</ol>
    <h1>Detalhes da Cidade <strong>{{$city->name}} </strong> do Estado <b>{{ $state->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $city->name }}
                </li>

                <li>
                    <strong>Status:</strong> {{ $city->status === 'Y' ? 'Inativo' : 'Ativo' }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('cities.state.destroy', [$state->url, $city->id]) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{$city->name}} </button>
            </form>

        </div>
    </div>
@endsection
