@extends('adminlte::page')

@section('title', 'Localiação')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('addresses.tenant.index',$tenant->url) }}" class="active">Localiação</a></li>

</ol>
    <h1>Localiação <a href=" {{ route('addresses.tenant.create', $tenant->url) }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card table-responsive">
        <div class="card-header">
           {{-- <form action="{{ route('addresses.tenant.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form> --}}
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th>Cidade</th>
                   <th>Logradouro</th>
                   <th>Numero</th>
                   <th>Bairro</th>

                   <th width="250" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($addresses as $address)
                        <tr>

                            <td>
                                {{$address->title}}
                            </td>
                            <td>
                                {{$address->address}}
                            </td>
                            <td>
                                {{$address->number}}
                            </td>
                            <td>
                                {{$address->district}}
                            </td>


                            <td style="width=10px">
                                {{-- <a href="{{ route('addresses.tenant.edit', $address->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('addresses.tenant.show', $address->id) }}" class="btn btn-warning">View</a>
                                <a href="{{ route('addresses.tenant.categories', $address->id) }}" class="btn btn-dark" title="Categorias"><i class="fas fa-layer-group"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $addresses->appends($filters)->links() !!}
                @else
                    {!! $addresses->links() !!}

                @endif

        </div>
    </div>
@stop
