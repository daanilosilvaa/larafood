@extends('adminlte::page')

@section('title', "Editar a Permissão {$state->name}")

@section('content_header')
    <h1>Editar a Permissão {{ $state->name }}</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('cities.state.update', $state->id) }}" class="form" method="POST">
                @method('PUT')

               @include('admin.pages.states.cities._partials.form')
            </form>

        </div>


    </div>
@endsection
