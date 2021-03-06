@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active">Produtos</a></li>

</ol>
    <h1>Produtos <a href=" {{ route('products.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card table-responsive">
        <div class="card-header">
           <form action="{{ route('products.search')}}" method="POST" class="form form-inline">
               @csrf
                <input type="text" name="filter" placeholder="Filtar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
           </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th width="90">image</th>
                   <th>Titulo</th>
                   <th>Preço</th>
                   <th width="250" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($products as $product)                 
                        <tr>
                            <td>
                               <img src="{{ url("storage/$product->image") }}" alt="{{$product->title}}" style="max-height: 90px">
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                {{number_format($product->price, 2, ',', '.')}}
                            </td>
                          
                            <td style="width=10px">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">View</a>
                                <a href="{{ route('products.categories', $product->id) }}" class="btn btn-dark" title="Categorias"><i class="fas fa-layer-group"></i></a>
                            </td>                    
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $products->appends($filters)->links() !!}
                @else 
                    {!! $products->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
