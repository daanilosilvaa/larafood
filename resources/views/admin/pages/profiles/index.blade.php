
@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfils</a></li>

</ol>
    <h1>Perfils <a href=" {{ route('profiles.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('profiles.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                 
                   <th width="250">Ação</th>
               </thead>
               <tbody>
                    @foreach ($profiles as $profile)
                    
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                           
                            

                            <td style="width=10px">
                                {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">View</a>
                            </td>
                           
                            
                            
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $profiles->appends($filters)->links() !!}
                @else 
                    {!! $profiles->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
