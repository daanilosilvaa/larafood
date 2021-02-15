@extends('adminlte::page')

@section('title', 'Realizar Novo pedido')

@section('content_header')
    <h1>Realizar Novo pedido</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('sales.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.sales._partials.form')
            </form>

        </div>


    </div>
@endsection