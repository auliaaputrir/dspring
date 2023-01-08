<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- My Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    @include('pages.style')

    <title>Hello, world!</title>
</head>

<body>

    {{-- Navbar --}}

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">D'Spring Kost</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#fasilitas">Fasilitas</a>
                    <a class="nav-item nav-link" href="#harga">Harga</a>
                    <a class="nav-item nav-link" href="#kontak-kami">Kontak</a>
                    <a class="nav-item nav-link" href="#galeri">Galelri</a>
                    <a class="nav-item btn btn-primary tombol" href="#">Login</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Akhir Navbar --}}

    {{-- Jumbotron --}}

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>More Than Just <br>a Borading House </span> </h1>
            <a href="" class="btn btn-primary tombol">Ruang Kami</a>
        </div>
    </div>

    {{-- Akhir Jumbotron --}}

    {{-- Container --}}
    <div class="container">

        {{-- Info Panel --}}
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
              <div class="row benefits">
                <div class="col-md-4 mt-md-0">
                  <div class="rectangle mx-auto px-1">
                    <img src="{{ url('/assets/dist/img/wifi-signal.png') }}"
                      alt="benefits-1" class="img-fluid">
                    <div class="headline-benefit">
                      Sign Up
                    </div>
                    <div class="subheadline-benefit mt-2">
                      Get yourself ready and join <br class="d-none d-md-block">
                      our great adventures
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mt-5 mt-md-0">
                  <div class="rectangle mx-auto px-1">
                    <img
                      src="{{ url('/assets/dist/img/wifi-solid.svg') }}"
                      alt="benefits-1" class="img-fluid">
                    <div class="headline-benefit">
                      Finish The Quiz
                    </div>
                    <div class="subheadline-benefit mt-2">
                      Answer the question that we’ve <br class="d-none d-md-block">
                      prepared for your career
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mt-5 mt-md-0">
                  <div class="rectangle mx-auto px-1">
                    <img
                      src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-Job/benefit-job-3.png"
                      alt="benefits-1" class="img-fluid">
                    <div class="headline-benefit">
                      Interview
                    </div>
                    <div class="subheadline-benefit mt-2">
                      We will setup the meeting with <br class="d-none d-md-block">
                      your dream companies
                    </div>
                  </div>
                </div>
              </div>
                {{-- <div class="row">
                    <div class="col-lg">
                        <div class="judul">Fasilitas</div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/wifi-solid.svg') }}" alt="Wi-Fi" class="float-left">
                        <h4>Wi-Fi</h4>
                    </div>
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/digital-tachograph-solid.svg') }}" alt="Televisi"
                            class="float-left">
                        <h4>Televisi</h4>
                    </div>
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/chair-solid.svg') }}" alt="Kursi" class="float-left">
                        <h4>Kursi</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/burn-solid.svg') }}" alt="Emot Api" class="float-left">
                        <h4>Emot Api</h4>
                    </div>
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/accusoft-brands.svg') }}" alt="Emot 3 Bentuk"
                            class="float-left">
                        <h4>Emot 3 Bentuk</h4>
                    </div>
                    <div class="col-lg">
                        <img src="{{ url('/assets/aul/bag2/cocktail-solid.svg') }}" alt="Es Jeruk" class="float-left">
                        <h4>Es Jeruk</h4>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- Akhir Info Panel --}}

    </div>
    {{-- Akhir Container --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

{{-- halo all

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dspring web</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <form method="post" action="{{ route('reservasi-store') }}">
                        @csrf
                        <label for="room">Room</label>
                        <select name="room_number" name="room_number" id="room_number">
                            <option selected disabled>Pilih Kamar</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                            @endforeach
                        </select><br>
                        <label for="period">Periode</label>
                        <select name="period" id="period">
                            <option value="" disabled selected>Periode</option>
                            <option value="Bulanan">Bulanan</option>
                            <option value="Tahunan">Tahunan</option>
                        </select><br>
                        <label for="stay_date">Mulai ditempati</label>
                        <input type="date" name="stay_date" id="stay_date" min="{{ Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                        <br><button type='submit'>Pesan</button>
                    </form>
                </div>
            </div>
        </div> --}}
{{-- </div>
</div>
@endsection --}}
