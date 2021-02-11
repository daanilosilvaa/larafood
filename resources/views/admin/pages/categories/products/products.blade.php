
@extends('adminlte::page')

@section('title', "Produtos da categoria $category->name")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">Permissão</a></li>

</ol>
    <h1>Produtos da categoria : <strong>{{$category->name}}</strong></h1>
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
                    @foreach ($products as $product)                    
                        <tr>
                            <td>
                                {{$product->title}}
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
                    {!! $products->appends($filters)->links() !!}
                @else 
                    {!! $products->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
