@extends('adminlte::page')

@section('title', "Editar a cidade de {$city->name} do estado: {$state->name}")

@section('content_header')
    <h1>Editar a cidade de <strong>{{$city->name}}</strong> do estado: <strong>{{ $state->name }}</strong></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('cities.state.update', [$state->url, $city->id]) }}" class="form" method="POST">
                @method('PUT')

               @include('admin.pages.states.cities._partials.form')
            </form>

        </div>


    </div>
@endsection
