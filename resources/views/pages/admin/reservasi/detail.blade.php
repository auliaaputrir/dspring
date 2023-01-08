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
                        <h1 class="m-0">Detail Reservasi</h1>
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
                                <h3 class="card-title" style="border-bottom: 5px;">Id Reservasi : {{ $r->id }}</h3>
                            </div><!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 text-right">
                                        <p>{{ $r->created_at }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Nama
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->users->name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Email
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->users->email}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Nomor Telepon
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->users->telephone_number }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        No Kamar
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->rooms->room_number }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Periode Sewa
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->period }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        Tanggal Masuk
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $r->stay_date }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
