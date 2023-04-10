@extends('/layouts/admin')

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
                                <h3 class="card-title py-2">Daftar Reservasi</h3>
                                <div class="float-sm-right">
                                    <a href="{{ route('reservasi-create') }}" class="btn status-hijau"><i class="fas fa-plus" style="paddimg-right:10px;" > Tambah Data</i></a>
                                </div>
                            </div>

                            <div class="card-body">

                                {{-- START FLASH MESSAGE --}}
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('warning'))
                                            <div class="alert alert-warning alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('info'))
                                            <div class="alert alert-info alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                Please check the form below for errors
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- END FLASH MESSAGE --}}
                                <table class="table table-hover table-responsive-xl" id="datatable">
                                    <thead>
                                        <th>No</th>
                                        <th>Nomor Kamar</th>
                                        <th>Id User</th>
                                        <TH>Nama</TH>
                                        <th>Periode</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        <tr>
                                            @forelse ($reservasi as $r)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->rooms->room_number }}</td>
                                                <td>{{ $r->users->id }}</td>
                                                <td>{{ $r->name }}</td>
                                                <td>{{ $r->period }}</td>
                                                <td>{{ $r->stay_date }}</td>
                                                <td>
                                                <div class="row mb-1">

                                                    @if ($r->reservation_status == 'Menunggu')
                                                        <span class="status-kuning">{{ $r->reservation_status }}</span>
                                                    @endif
                                                    @if ($r->reservation_status == 'Diterima')
                                                        <span class="status-hijau">
                                                            {{ $r->reservation_status }} </span>
                                                    @endif
                                                    @if ($r->reservation_status == 'Ditolak')
                                                        <span class="status-merah">
                                                            {{ $r->reservation_status }} </span>
                                                    @endif
                                                </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('reservasi-detail', $r->id) }}" class="btn btn-primary ">
                                                     Detail
                                                    </a>
                                                </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                Data Kosong
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable();
        });
    </script>
@endpush
