
@extends('adminlte::page')

@section('title', "Categorias do produto $product->title")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('products.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.categories', $product->id) }}" class="active">Categorias</a></li>

</ol>
    <h1>Categorias do produto : <strong>{{$product->title }} </strong><a href=" {{ route('products.categories.available', $product->id ) }} " class="btn btn-dark"> <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                   <th width="50">Ação</th>
               </thead>
               <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('products.category.detch', [$product->id, $category->id]) }}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $categories->appends($filters)->links() !!}
                @else 
                    {!! $categories->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
