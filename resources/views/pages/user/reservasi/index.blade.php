<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- My Fonts --}}
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">



    @include('pages.style')
    <link rel="shortcut icon" href="{{ url('assets/dist/img/logo.png') }}" type="image/x-icon">

    <title>D'Spring Kost Putri Eksklusif</title>
    <style>
        
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
        <div class="container mt-1 mb-3">
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/dist/img/logo.png') }}" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                D'SPRING KOST
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link text-dark" href="/">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link text-dark" href="/#fasilitas">Fasilitas</a>
                    <a class="nav-item nav-link text-dark" href="/#harga">Harga</a>
                    <a class="nav-item nav-link text-dark" href="/#kontak-kami">Kontak</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" style="text-transform: none !important;"
                                href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Halo, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/penyewa/reservasi">Reservasi saya</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>


                </div>
            </div>
        </div>
    </nav>


    <section id="reservasi">
        <div class="container">
            @forelse ($reservasi as $r)
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3">
                                        <h5 class="card-title">Id Reservasi : {{ $r->id }}</h5>
                                    </div>
                                    <div class="col-9 text-right mt-1">
                                        @if ($r->reservation_status == 'Menunggu')
                                            <span class="status-kuning"><i
                                                    class="fas fa-clock"></i>{{ $r->reservation_status }}</span>
                                        @endif
                                        @if ($r->reservation_status == 'Diterima')
                                            <span class="status-hijau"><i class="fas fa-check-circle"></i>
                                                {{ $r->reservation_status }} </span>
                                        @endif
                                        @if ($r->reservation_status == 'Ditolak')
                                            <span class="status-merah"><i class="fas fa-times-circle"></i>
                                                {{ $r->reservation_status }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <p>{{ $r->created_at }}</p>
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
                                @if ($r->payments)    
                                    <div class="row">
                                        <div class="col-2">
                                            Pembayaran
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-8">
                                            {{ $r->payments->payment_status }}
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-center">
                                        @if ($r->reservation_status != 'Diterima')
                                            <a href="#" class="btn btn-primary disabled ">Lanjutkan
                                                Pembayaran</a>
                                        @else
                                            <a href="{{ route('pembayaran', $r->id) }}"
                                                class="btn btn-primary">Lanjutkan Pembayaran</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                'kosong'
            @endforelse
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</html>

    {{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4><a href="/penyewa/reservasi-create">Tambah  Kamar</a></h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Periode Sewa</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($reservasi as $r)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->rooms->room_number }}</td>
                    <td>{{ $r->period }}</td>
                    <td>{{ $r->stay_date }}</td>
                    <td>{{ $r->reservation_status}}</td>
                        @if ($r->reservation_status == 'Menunggu')
                    <td><a href="">Batalkan Pesanan</a></td>        
                        @endif
                        @if ($r->reservation_status == 'Diterima')
 
                    <td><a href="{{ route('pembayaran', $r->id) }}">Lanjut pembayaran</a></td>
                        @endif --}}
    {{-- <td><a href="{{ route('kamar-edit', $room->id) }}">Edit</a> | <a href="{{ route('kamar-delete', $room->id) }}" onclick="return confirm('Hapus data kamar?')">Hapus</a></td> --}}
    {{-- </tr>
                    @empty
                    <tr>
                        <td>
                            Data Kosong
                        </td>
                    </tr> 
                    @endforelse
            </tbody>

        </table>
</body>
</html> --}}
