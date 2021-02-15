@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('tables.index') }}">Mesa</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.show', $table->id) }}" class="active">{{ $table->identify}}</a></li>

</ol>
    <h1>Detalhes da Mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">    
            <ul>
                <li>
                    <strong>Nome:</strong>{{ $table->identify }}
                </li>
                <li>
                    <strong>Descrição</strong>{{ $table->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('tables.destroy', $table->id) }}"  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar  {{ $table->identify }} </button>
            </form>

        </div>
    </div>
@endsection