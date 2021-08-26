@extends('adminlte::page')

@section('title', 'Cadastrar Novo Estado')

@section('content_header')
    <h1>Cadastrar Novo Estado</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('states.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.states._partials.form')
            </form>
        </div>
    </div>
@endsection
