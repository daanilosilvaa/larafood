@extends('adminlte::page')

@section('title', 'Cadastrar Novo Endereço')

@section('content_header')
    <h1>Cadastrar Novo Endereço</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('addresses.tenant.store', $tenant->url) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.tenants.addresses._partials.form')
            </form>

        </div>


    </div>
@endsection


