@extends('adminlte::page')

@section('title', 'Vendas')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('sales.index') }}" class="active">Vendas</a></li>

</ol>
    <h1>Vendas <a href=" {{ route('sales.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('sales.search')}}" method="POST" class="form form-inline">
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
                   <th width="150" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($sales as $sale)                 
                        <tr>
                            <td>
                                {{$sale->identify}}
                            </td>                            
                            <td style="width=20px">
                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-warning">View</a>
                            </td>                    
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $sales->appends($filters)->links() !!}
                @else 
                    {!! $sales->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
