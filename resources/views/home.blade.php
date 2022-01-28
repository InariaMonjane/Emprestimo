@extends('layouts.app')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container py-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Entidades</span>
                <span class="info-box-number">Total: {{ $entidades}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>  
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-user-secret"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Contas</span>
                <span class="info-box-number">Total: {{ $contas}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>  
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">  
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="fas fa-child"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Funcionarios</span>
                <span class="info-box-number">Total: {{ $users }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <a href="" class="a-info-box">
            <div class="info-box text-dark">
              <span class="info-box-icon  elevation-1"><i class="far fa-dot-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Ganho anual</span>
                <span class="info-box-number">Total: {{ $ganhos }},00MT</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
@endsection
