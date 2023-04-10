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
                    <a class="nav-item nav-link text-dark" href="#">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link text-dark" href="#fasilitas">Fasilitas</a>
                    <a class="nav-item nav-link text-dark" href="#harga">Harga</a>
                    <a class="nav-item nav-link text-dark" href="#kontak-kami">Kontak</a>
                    <a class="nav-item nav-link text-dark" href="#galeri">Galeri</a>
                    @if (!Auth::user())
                        <a class="nav-item btn tombol text-light" href="{{ route('login') }}">Login</a>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" style="text-transform: none !important;"
                                href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Halo, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="/admin">Dashboard</a>
                                @else
                                <a class="dropdown-item" href="/penyewa/reservasi">Reservasi saya</a>
                                @endif
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
                    @endif


                </div>
            </div>
        </div>
    </nav>


    {{-- Akhir Navbar --}}

    {{-- Jumbotron --}}

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>More Than Just <br>a Boarding House </span> </h1>
            <a href="#pemesanan" class="btn tombol">Pemesanan</a>
        </div>
    </div>

    {{-- Akhir Jumbotron --}}

    <section id="fasilitas" class="fasilitas">
        <div class="container">

            <div class="section-title">
                <h2>Fasiltas</h2>
            </div>

            <div class="row ">
                <div class="col-lg-4 col-md-6 align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-wifi"></i></div>
                        <h4><a href="">WiFi</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-video"></i></div>
                        <h4><a href="">CCTV 24 Jam</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-snowflake"></i></div>
                        <h4><a href="">AC</a></h4>
                    </div>
                </div>

            </div>
            <div class="row mt-4 mb-1">
                <div class="col-lg-4 col-md-6 align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-cocktail"></i></div>
                        <h4><a href="">Dapur Umum</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-couch"></i></div>
                        <h4><a href="">Ruang Tamu</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="fas fa-shower"></i></div>
                        <h4><a href="">Water Heather</a></h4>
                    </div>
                </div>

            </div>



        </div>
    </section><!-- End of Fasilitas -->
    <!-- ======= Spesifikasi  ======= -->
    <section id="spesifikasi" class="spesifikasi pt-4 pb-4">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first mt-5">
                    <img src="{{ url('assets/dist/img/DSCF0209.JPG') }}" style="height: 500px;" class="img-fluid"
                        alt="">
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                </div>
                <div class="col-lg-6 content order-last order-lg-first mt-5 pt-5">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="far fa-check-circle"></i>
                            <div>
                                <h5>Luas 3 x 3,4 M</h5>
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="far fa-check-circle"></i></i>
                            <div>
                                <h5>Lantai Granite Tile</h5>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="far fa-check-circle"></i></i>
                            <div>
                                <h5>Meja & Lemari
                                </h5>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="far fa-check-circle"></i>
                            <div>
                                <h5>Springbed with Drawer</h5>
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="far fa-check-circle"></i></i>
                            <div>
                                <h5>Water Heater (Lantai 2)</h5>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="far fa-check-circle"></i></i>
                            <div>
                                <h5>Closet Duduk & Shower</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End spesifikasi Us Section -->
    <!-- ======= Harga ======= -->
    <section id="harga" class="harga section-bg mb-5 pb-5">
        <div class="container">

            <div class="section-title">
                <h2>Harga</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box mb-5">
                        <i class="bi bi-briefcase"></i>
                        <h3>Bulanan</h3>
                            <p>Mulai dari</p>
                            <h4><sup>Rp.</sup>{{ number_format($get_price, 2, ',', '.') }}<sub>/bulan</sub></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="icon-box mb-5 ribbon-corner ribbon-xl">
                        <div class="ribbon ribbon-top-left"><span>Lebih Hemat</span></div>
                        <i class="bi bi-briefcase"></i>
                        <h3 >Tahunan</h3>
                            <p>Mulai dari</p>
                            <h4><sup>Rp.</sup>{{ number_format($yearly_price, 2, ',', '.') }} <sub>/bulan</sub></h4>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
    <!-- Page Content -->
    <section id="galeri" class="galeri">

        <div class="container">
            <div class="section-title">
                <h2>Galeri</h2>
            </div>
            <div class="row text-center text-lg-start">

                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-75">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/DSCF0305.jpg') }}"
                            alt="">
                    </a>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail mb-4" src="{{ url('assets/dist/img/kitchen1.png') }}"
                            alt="">
                        <img class="img-fluid img-thumbnail mb-4" src="{{ url('assets/dist/img/room.jpeg') }}"
                            alt="">
                        <img class="img-fluid img-thumbnail mb-4" src="{{ url('assets/dist/img/DSCF0253.jpg') }}"
                            alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-4">
                    <a href="#" class="d-block mb-4 h-75">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/DSCF0048.JPG') }}"
                            alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/2021-04-17.png') }}"
                            alt="">
                    </a>
                </div>
                <div class="col-lg-5 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/ruangtamu.png') }}"
                            alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6 ">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/DSCF0302.JPG') }}"
                            alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-6 ">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{ url('assets/dist/img/DSCF0209.JPG') }}"
                            alt="">
                    </a>
                </div>
            </div>
    </section>

    </div>
    <section id="pemesanan" class="pemesanan section-bg mb-5 pb-5">
        <div class="container">

            <div class="section-title">
                <h2>Pemesanan</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">


                    <form method="post" action="{{ route('reservasi-store') }}">
                        @csrf
                        {{-- Nomor Kamar --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="floor_number"><b>Lantai</b> </label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="floor_number"
                                        class="form-control @error('floor_number') is-invalid @enderror"
                                        id="floor_number">
                                        <option value="" disabled selected>Pilih Lantai</option>
                                        <option value="1" {{ old('floor_number') === '1' ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2" {{ old('floor_number') === '2' ? 'selected' : '' }}>2
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="room_number"><b>Nomor Kamar</b></label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="room_number"
                                        class="form-control @error('room_number') is-invalid @enderror"
                                        id="room_number">
                                        <option value="" disabled selected>Pilih Kamar</option>

                                    </select>
                                    @error('Nomor Kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="period"><b>Periode</b> </label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="period" class="form-control @error('period') is-invalid @enderror"
                                        id="period">
                                        <option value="" disabled selected>Periode</option>
                                        <option value="Bulanan" {{ old('period') === 'Bulanan' ? 'selected' : '' }}>
                                            Bulanan</option>
                                        <option value="Tahunan" {{ old('period') === 'Tahunan' ? 'selected' : '' }}>
                                            Tahunan</option>
                                    </select>
                                    @error('Periode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="stay_date"><b>Mulai ditempati</b> </label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <input type="date" value="{{ old('stay_date') }}"
                                        class="form-control @error('stay_date') is-invalid @enderror" name="stay_date"
                                        id="stay_date" min="{{ Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            {{-- <button class="btn btn-primary" style="width: 150px;" type='submit'> --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"> Pesan</button>
                        </div>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Syarat dan Ketentuan D'Spring Kost</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <ol>
                                        <li>Penyewa kos bertanggung jawab atas barang miliknya masing-masing</li>
                                        <li>Menjaga ketenangan dan kenyaman bersama dengan tidak membuat kegaduhan dan saling menghormati penghuni kost yang lain</li>
                                        <li>Menjaga kebersihan dan kenyamanan bersama dengan membersihkan dan merapikan kembali setelah menggunakan fasilitas bersama di dalam kost</li>
                                        <li>Tidak menggunakan tempat kost untuk melakukan hal-hal yang bertentangan dengan hukum dan norma-norma yang berlaku di masyarakat umum</li>
                                        <li>Menggunakan dan menjaga inventaris kost dengan baik dan tidak melakukan perubahan rumah kost (contohnya memaku tembok, mencoret-coret tembok dan furnitur)</li>
                                        <li>Parkirlah kendaraan Anda dengan rapi dan berada di dalam area kost sehingga tidak menganggu pengguna jalan yang lain</li>
                                        <li>Tidak menyimpan barang-barang berbahaya (senjata api, bahan mudah terbakar) dan barang-barang yang dilarang (narkoba, miras)</li>
                                        <li>Dilarang membawa tamu laki-laki kedalam kos</li>
                                        <li>Menghemat pemakaian air, listrik, dan gas demi lingkungan yang lebih baik</li>
                                        <li>Dalam hal penyewa telah mendapatkan 3 kali teguran dan tetap tidak mentaati syarat dan ketentuan ini, maka pengelola kos berhak menghentikan perjanjian sewa dan mengelurkan penyewa dari rumah kos.</li>
                                    </ol>
                                </div>
                                <div class="modal-footer">
                                    <label for="myCheck">Saya menyetujui syarat dan ketentuan yang berlaku</label>
                                    <input type="checkbox" id="myCheck" onclick="myFunction()">
                        
                        
                                  <button class="btn btn-primary" id="text" style="width: 150px; display:none;" type='submit'> Pesan </button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak-kami" class="kontak-kami">
        <div class="container">
            <div class="section-title">
                <h2>Kontak Kami</h2>
            </div>
            <div class="row">
                <div class="col-6">
                    <div>
                        <iframe style="border:0; width: 100%; height: 290px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2011650905774!2d110.76236041744389!3d-7.553030999999988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a159047f75e4d%3A0x8df5e5980edf2122!2sD&#39;Spring%20Kost%20Eksklusif!5e0!3m2!1sid!2sid!4v1673111384544!5m2!1sid!2sid"
                            frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>
                <div class="col-6 mt-2">
                    <div class="row ml-4">
                        <div class="col-12">
                            <h4>Alamat</h4>
                            <p>
                                Jl. Menco XX No.7, Nilagraha, Gonilan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah
                                57169
                            </p>
                        </div>
                    </div>
                    <div class="row ml-4">
                        <div class="col-6">
                            <h4>WhatsApp</h4>
                            <p>08972850515</p>
                        </div>

                    </div>
                    <div class="row ml-4">
                        <div class="col-6">
                            <h4>Email</h4>
                            <p>halodspring@gmail.com</p>
                        </div>
                    </div>

                </div>
    </section>
    <!-- Modal -->

    <section id="footer" class=" section-bg mb-3 mt-5">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>D'Spring Kost Putri Eksklusif</span></strong>. All Rights Reserved
            </div>
        </div>
    </section>
</body>
{{-- Akhir Container --}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
<script>
    $(function() {
        $(function() {
            $('#floor_number').on('change', function() {
                let val = $(this).val()
                if(val){
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('getfloor') }}',
                        data: {getfloor : val},
                        headers: { 'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content') },
                        dataType: 'json',
                        success: function(data) {
                            $('#room_number').empty()
                            $('#room_number').append(new Option('Pilih Kamar', ''))
                            $("#room_number option[value='']").attr("disabled", "disabled");
                            data.forEach(el => {
                                $('#room_number').append(new Option(el.room_number, el.id))
                            });
                        },
                        error: function(xhr, status, error){
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        })
    });
</script>


</html>