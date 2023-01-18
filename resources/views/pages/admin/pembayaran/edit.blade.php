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
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title" style="border-bottom: 5px;">Ubah Status Pembayaran</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        @if ($payment->payment_status == 'Menunggu')
                                            <form method="post" action="{{ route('pembayaran-update', $payment->id) }}">
                                                @csrf
                                                @method('patch')
                                                <button class="btn btn-success" name="payment_status" value="Terbayar"
                                                    type="submit">Terima</button>
                                                <button class="btn btn-danger" name="payment_status" value="Ditolak"
                                                    type="submit">Tolak</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nomor Kamar</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label"
                                            value="{{ $payment->reservations->rooms->room_number }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Penyewa</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label" value="{{ $payment->reservations->users->name }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nomor Hp</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label"
                                            value="{{ $payment->reservations->users->telephone_number }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Periode Sewa</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label" value="{{ $payment->reservations->period }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label" value="{{ $payment->reservations->stay_date }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label"
                                            value="Rp. {{ number_format($payment->total, 2, ',', '.') }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="colFormLabel"
                                            placeholder="col-form-label" value="{{ $payment->payment_status }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-12 col-form-label">Bukti Transafer</label>
                                    <div class="col-sm-12">
                                        <img src="{{ asset('/upload/' . $payment->image) }}" alt=""
                                            class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection
