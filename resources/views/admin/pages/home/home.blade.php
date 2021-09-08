
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-layer-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categorias</span>
              <span class="info-box-number">
                {{$totalCategories}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-hamburger"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produtos</span>
              <span class="info-box-number">
                {{$totalProducts}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-aqua elevation-1"><i class="fa fa-th"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mesas</span>
              <span class="info-box-number">
                {{$totalTables}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number">
                  {{$totalUsers}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-building"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Empresas</span>
            <span class="info-box-number">
              {{$totalTenants}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-list-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Planos</span>
            <span class="info-box-number">
              {{$totalPlans}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-globe-americas"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Estados</span>
            <span class="info-box-number">
              {{$totalState}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-address-card"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Cargos</span>
            <span class="info-box-number">
              {{$totalRoles}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-address-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Perfils</span>
            <span class="info-box-number">
              {{$totalProfils}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
      @admin
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-aqua elevation-1"><i class="fas fa-lock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Permissão</span>
            <span class="info-box-number">
              {{$totalPermissions}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      @endadmin
    </div>
@endsection






