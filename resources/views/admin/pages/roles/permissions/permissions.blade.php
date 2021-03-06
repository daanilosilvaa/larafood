
@extends('adminlte::page')

@section('title', "Permissão do cargo $role->name")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="active">Cargos</a></li>

</ol>
    <h1>Permissão do cargo  : <strong>{{$role->name}}</strong>
         <a href=" {{ route('roles.permissions.available', $role->id ) }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
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
                    @foreach ($permissions as $permission)
                    
                        <tr>
                            
                            <td>
                                {{$permission->name}}
                            </td>
                           
                            

                            <td style="width=10px">
                                <a href="{{ route('roles.permission.detch', [$role->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                            </td>
                           
                            
                            
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $permissions->appends($filters)->links() !!}
                @else 
                    {!! $permissions->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
