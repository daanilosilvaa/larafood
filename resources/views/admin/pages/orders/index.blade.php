@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}" class="active">Pedidos</a></li>

</ol>

    <h1>Pedidos</h1>
@endsection
@section('cotent')
    <div id="app" class="card">
        <orders-tenant></orders-tenant>
    </div>
@endsection
@section('adminlte_js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@push('scrips-header')
    <script>
        window.Laravel = {!! json_encode([
            'tenantId' =>auth()->check() ? auth()->user()->tenant_id : ''
        ]) !!}
    </script>

@endpush
