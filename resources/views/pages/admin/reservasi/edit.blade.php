{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Reservasi</title>
</head>
<body>
    <form method="post" action="{{ route('reservasi-update', $reservasi->id) }}">
        @csrf
        @method('patch')
        <label for="reservation_status">Status Reservasi</label>
        <select name="reservation_status" id="reservation_status" value="{{ $reservasi->reservation_status }}">
            <option value="Diterima" {{ $reservasi->reservation_status === 'Diterima' ? 'selected' : '' }}>Diterima</option>        
            <option value="Ditolak"{{ $reservasi->reservation_status === 'Ditolak' ? 'selected' : '' }}>Ditolak </option>
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
                    <h1 class="m-0">Reservasi</h1>
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
                    <h3 class="card-title" style="border-bottom: 5px;">Ubah Status Reservasi</h3>
                </div><!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('reservasi-update', $reservasi->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="reservation_status">Status Reservasi</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="reservation_status"
                                        class="form-control" 
                                        id="reservation_status">
                                        <option value="Diterima" {{ $reservasi->reservation_status === 'Diterima' ? 'selected' : '' }}>Diterima
                                        </option>
                                        <option value="Ditolak" {{ $reservasi->reservation_status === 'Ditolak' ? 'selected' : '' }}>Ditolak
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
