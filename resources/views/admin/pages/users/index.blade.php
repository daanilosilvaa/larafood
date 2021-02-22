@extends('adminlte::page')

@section('title', 'Usuáros')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Usuáros</a></li>

</ol>
    <h1>Usuáros <a href=" {{ route('users.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('users.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                   <th>E-mail</th>
                   <th width="270" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($users as $user)                 
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">View</a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-dark" title="Cargos"><i class="fas fa-address-card"></i>
                                </a>
                            </td>                    
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $users->appends($filters)->links() !!}
                @else 
                    {!! $users->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
