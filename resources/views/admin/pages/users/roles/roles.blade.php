
@extends('adminlte::page')

@section('title', "Cargo do usuário $user->name")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>

</ol>
    <h1>Cargo do usuário  : <strong>{{$user->name}}</strong>
         <a href=" {{ route('users.roles.available', $user->id ) }} " class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
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
                    @foreach ($roles as $role)
                    
                        <tr>
                            
                            <td>
                                {{$role->name}}
                            </td>
                           
                            

                            <td style="width=10px">
                                <a href="{{ route('users.roles.detch', [$user->id, $role->id]) }}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                            </td>
                           
                            
                            
                        </tr>
                    @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                    {!! $roles->appends($filters)->links() !!}
                @else 
                    {!! $roles->links() !!}
                    
                @endif
            
        </div>
    </div>
@stop
