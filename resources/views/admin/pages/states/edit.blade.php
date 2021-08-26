@extends('adminlte::page')

@section('title', "Editar o Estado {$state->name}")

@section('content_header')
    <h1>Editar o Estado {{ $state->name }}</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('states.update', $state->id) }}" class="form" method="POST">
                @method('PUT')

               @include('admin.pages.states._partials.form')
            </form>

        </div>


    </div>
@endsection
