@extends('adminlte::page')

@section('title', 'Detalhes do Tenant')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('tenants.index') }}">Tenant</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tenants.show', $tenant->id) }}" class="active">{{ $tenant->name}}</a></li>

</ol>
    <h1>Detalhes do Tenant <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <ul>
                    <img src="{{ url("storage/$tenant->logo") }}" alt="{{$tenant->name}}" style="max-height: 50px">
                <li>
                    <strong>Plano: </strong>{{ $tenant->plan->name }}
                </li>
                <li>
                    <strong>Nome: </strong>{{ $tenant->name }}
                </li>
                <li>
                    <strong>URL: </strong>{{ $tenant->url }}
                </li>
                <li>
                    <strong>E-mail: </strong>{{ $tenant->email }}
                </li>
                <li>
                    <strong>CNPJ: </strong>{{ $tenant->cnpj }}
                </li>
                <li>
                    <strong>Ativo: </strong>{{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}
                </li>

            </ul>
            <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong>{{ $tenant->subscription }}
                </li>
                <li>
                    <strong>Data Expira: </strong> {{ $tenant->expires_at }}
                </li>
                <li>
                    <strong>Identificador: </strong> {{ $tenant->subscription_id }}
                </li>
                <li>
                    <strong>Assinatura Ativa? </strong> {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}
                </li>
                <li>
                    <strong>Cancelou? </strong> {{ $tenant->subscription_suspended ? 'SIM' : 'NÃO' }}
                </li>
            </ul>
        </div>
    </div>
@endsection
