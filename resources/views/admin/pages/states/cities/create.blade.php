@extends('adminlte::page')

@section('title', 'Cadastrar Nova Cidade')

@section('content_header')
    <h1>Cadastrar Nova Cidade</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('cities.state.store',$state->url) }}" class="form" method="POST">
                @csrf
                @include('admin.pages.states.cities._partials.form')
            </form>
        </div>
    </div>
@endsection
