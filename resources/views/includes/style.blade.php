<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">

<!-- daterange picker -->
{{-- <link rel="stylesheet" href="{{ url('assets/plugins/daterangepicker/daterangepicker.css') }}"> --}}

<style>
    .btn{
        border-radius: 8px;
    }
    .btn.mybtn{
        border-color: #fff;
        background-color: #90c643;
        color: #fff;
    }
    .btn.action{
        color: #929496;
    }
    .btn.action:hover{
        color: #000000;
    }
    /* .btn.btn-primary.logout{
        background-color: #ffffff;
        border-color: #fff;
        color: #005331;
        font-weight: 600;
    } */
    /* .btn.btn-primary.logout:hover{
        background-color: transparent;
        color: #90c643;
        border-color: #fff;
    } */
    
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link {
        background-color: transparent;
        color: #343a40;
        /* width: 75%;
        margin: auto;
        margin-bottom: -10px; */
        /* box-direction: none;
        outline-style: none; */
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link {
        background-color: transparent;
        color: #343a40;
        /* width: 75%;
        margin: auto;
        margin-bottom: -10px; */
        /* box-direction: none;
        outline-style: none; */
    }
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #90c643;
        color: #fff;
        /* width: 75%;
        margin: auto; */
    }
    .nav-link:hover::after{
		background-color: #eeffe6;
        color: #fff;
        /* width: 75%;
        margin: auto; */
	}
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    .myTitle{
        font-size: 25px;
        font-weight: medium;
       
        text-transform: uppercase;
    }
    .card-title{
        font-size: 20px;
        font-weight: bold;

    }
    
    .status-merah{
        padding: 8px;
        border-radius: 5px;
        background-color: #f44336;
        color: white;
    }
    .status-kuning{
        padding: 8px;
        border-radius: 5px;
        background-color: #ffc400;
        color: black;
    }
    .status-oren {
    padding: 8px;
    border-radius: 5px;
    background-color: #ff9933;
    color: white;
  }
    .status-hijau {
    padding: 8px;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
  }
  
</style>