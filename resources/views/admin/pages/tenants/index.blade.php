@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" class="active">Empresas</a></li>

</ol>
    <h1>Empresas</h1>
@stop

@section('content')
    <div class="card table-responsive">
        <div class="card-header">
           <form action="{{ route('tenants.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th width="90" >Logo</th>
                   <th>Nome</th>
                   <th width="250" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                               <img src="{{ url("storage/$tenant->logo") }}" alt="{{$tenant->name}}" style="max-height: 90px">
                            </td>
                            <td>
                                {{$tenant->name}}
                            </td>


                            <td style="width=10px">
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">View</a>
                                <a href="{{ route('addresses.tenant.index', $tenant->url) }}" class="btn btn-dark" title="Endereço"><i class="fas fa-map-marker-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $tenants->appends($filters)->links() !!}
                @else
                    {!! $tenants->links() !!}

                @endif

        </div>
    </div>
@stop
