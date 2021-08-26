
@extends('adminlte::page')

@section('title', 'Estados')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('states.index') }}" class="active">Estados</a></li>

</ol>
    <h1>Estados <a href=" {{ route('states.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('states.search')}}" method="POST" class="form form-inline">
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
                   <th>Sigla</th>
                   <th>Status</th>

                   <th width="250">Ação</th>
               </thead>
               <tbody>
                    @foreach ($states as $state)

                        <tr>
                            <td>
                                {{$state->name}}
                            </td>
                            <td>
                                {{$state->initials}}
                            </td>
                            <td>
                                {{$state->active == '1' ? 'Ativo' : 'Inativo'}}
                            </td>



                            <td style="width=10px">
                                <a href="{{ route('states.edit', $state->url) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('states.show', $state->url) }}" class="btn btn-warning">View</a>
                                @if ($state->active == 1)
                                    <a href="{{ route('cities.state.index', $state->url) }}" class="btn btn-primary"><i class="fas fa-city"></i></a>
                                @else
                                    <button class="btn btn-primary" disabled><i class="fas fa-city"></i></button>
                                @endif
                            </td>



                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $states->appends($filters)->links() !!}
                @else
                    {!! $states->links() !!}

                @endif

        </div>
    </div>
@stop
