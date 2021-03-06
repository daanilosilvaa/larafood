@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>

</ol>
    <h1>Categorias 
       
            <a href=" {{ route('categories.create') }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a>
      
        
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('categories.search')}}" method="POST" class="form form-inline">
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
                   <th>Descrição</th>
                   <th width="200" class="text-center">Ação</th>
               </thead>
               <tbody>
                    @foreach ($categories as $category)                 
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                {{$category->description}}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">View</a>
                                <a href="{{ route('categories.products', [$category->id]) }}" class="btn btn-dark"><i class="fas fa-hamburger"></i></a>
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
