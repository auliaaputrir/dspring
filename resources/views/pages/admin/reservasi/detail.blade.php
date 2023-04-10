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
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title" style="border-bottom: 5px;">Id Reservasi : {{ $r->id }}</h3>
                                    </div>
                                    @if ($r->reservation_status == 'Menunggu')
                                        <div class="col-6 text-right">
                                            <form method="post" action="{{ route('reservasi-update', $r->id) }}">
                                                @csrf
                                                @method('patch')
                                                <button class="btn btn-success" name="reservation_status" value="Diterima" type="submit">Terima</button>
                                                <button class="btn btn-danger" name="reservation_status" value="Ditolak" type="submit">Tolak</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
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
                                        {{ $r->name }}
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
    </div>
    
    @endsection
