{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Reservasi</title>
</head>
<body>
    <form method="post" action="{{ route('pembayaran-update', $payment->id) }}">
        @csrf
        @method('patch')
        <label for="payment_status">Status Reservasi</label>
        <select name="payment_status" id="payment_status" value="{{ $payment->payment_status }}">
            <option value="Terbayar" {{ $payment->payment_status === 'Terbayar' ? 'selected' : '' }}>Terbayar</option>        
            <option value="Ditolak"{{ $payment->payment_status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Simpan</button>
    </form>
</body>
</html> --}}
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pembayaran</h1>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="border-bottom: 5px;">Ubah Status Pembayaran</h3>
                </div><!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('pembayaran-update', $payment->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="payment_status">Status Pembayaran</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="payment_status"
                                        class="form-control" 
                                        id="payment_status">
                                        <option value="Terbayar" {{ $payment->payment_status === 'Terbayar' ? 'selected' : '' }}>Terbayar</option> 
            
                                        <option value="Ditolak" {{ $payment->payment_status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option> 
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="card-foot">
                            <button type="submit" class="btn status-hijau float-right">Simpan</button>
                        </div>
                        
                </form>
            </div></div></div></div></div></div>
            @endsection
