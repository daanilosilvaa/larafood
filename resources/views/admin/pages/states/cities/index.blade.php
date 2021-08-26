
@extends('adminlte::page')

@section('title', "Cidade do estado: {$state->name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('states.index') }}" class="active">Estados</a></li>

</ol>
    <h1>Cidade do estado: {{$state->name}} <a href=" {{ route('cities.state.create',$state->url) }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
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
                   <th>Status</th>

                   <th width="250">Ação</th>
               </thead>
               <tbody>
                    @foreach ($cities as $city)

                        <tr>
                            <td>
                                {{$city->name}}
                            </td>
                            <td>
                                {{$city->ative === 'Y' ? 'Inativo' : 'Ativo'}}
                            </td>



                            <td style="width=10px">
                                <a href="{{ route('cities.state.edit',[$state->url, $city->id]) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('cities.state.show',[$state->url, $city->id]) }}" class="btn btn-warning">View</a>
                            </td>



                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $cities->appends($filters)->links() !!}
                @else
                    {!! $cities->links() !!}

                @endif

        </div>
    </div>
@stop
