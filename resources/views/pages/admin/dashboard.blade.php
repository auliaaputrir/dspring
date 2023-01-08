@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kamar</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{ date('l, d-m-Y') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                      <!-- Info boxes -->
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bed"></i></span>
              
                            <div class="info-box-content mb-1">
                              <span class="info-box-text mb-4">Kamar Tersedia</span>
                              <span class="info-box-number">{{ $rooms }}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-table"></i></span>
              
                            <div class="info-box-content mb-1">
                              <span class="info-box-text mb-4">Reservasi Aktif</span>
                              <span class="info-box-number">{{ $reservations }}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
              
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
              
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clock"></i></span>
              
                            <div class="info-box-content  ">
                              <span class="info-box-text">Reservasi Menunggu <br> Konfirmasi</span>
                              <span class="info-box-number">{{ $reservations_not_confirmed  }}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                          <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">Pembayaran <br>Menunggu Konfirmasi</span>
                              <span class="info-box-number">{{ $payment_not_confirmed }}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
    <!-- /.row -->
@endsection
