<!DOCTYPE html>
<html>
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

</head>

<body>

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
        <section class="reservasi">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-3">
                                        <h5 class="card-title">Id Reservasi : {{ $reservasi->id }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        No Kamar
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                        {{ $reservasi->rooms->room_number }}
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
                                        {{ $reservasi->period }}
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
                                        {{ $reservasi->stay_date }}
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="total">Total </label>
                                        </div>
                                        <div class="col-1">
                                            :
                                        </div>
                                        <div class="col-4">
                                            <input type="text" name="total" id="total"
                                                class="form-control" style="border: 0; "
                                                value="{{ $reservasi->payments->total }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        Status Pembayaran
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-8">
                                    @if ($reservasi->payments->payment_status == 'Menunggu')
                                    <span class="status-kuning"><i
                                            class="fas fa-clock"></i>{{ $reservasi->payments->payment_status}}</span>
                                    @elseif ($reservasi->payments->payment_status == 'Terbayar')
                                        <span class="status-hijau"><i class="fas fa-check-circle"></i>
                                            {{ $reservasi->payments->payment_status }} </span>
                                    @elseif ($reservasi->payments->payment_status == 'Ditolak')
                                        <span class="status-merah"><i class="fas fa-times-circle"></i>
                                            {{ $reservasi->payments->payment_status }} </span>
                                    @endif
                                    </div>
                                </div>
                                @if ($reservasi->payments->payment_status == "Menunggu")
                                    @if(!$reservasi->payments->image)
                                        <form method="POST" action="{{ route('pembayaran-create', $reservasi->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <label for="image">Unggah Bukti Pembayaran</label>
                                                    </div>
                                                    <div class="col-1 mt-1">
                                                        :
                                                    </div>
                                                    <div class="col-8 mt-1">
                                                        <input type="file" class="form-control"
                                                            style="border: 0; margin-left: -10px;" id="image"
                                                            name="image">
                                                    </div>
    
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button class="btn btn-primary " type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="{{ asset('upload/'.$reservasi->payments->image) }}" class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endif
                                @elseif($reservasi->payments->payment_status == "Ditolak")
                                    <form method="POST" action="{{ route('pembayaran-create', $reservasi->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="image">Unggah Bukti Pembayaran</label>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                    <input type="file" class="form-control"
                                                        style="border: 0; margin-left: -10px;" id="image"
                                                        name="image">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button class="btn btn-primary " type="submit">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
