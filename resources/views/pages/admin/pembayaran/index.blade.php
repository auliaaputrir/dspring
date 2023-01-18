@extends('/layouts/admin')

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
                                <h3 class="card-title py-2">Daftar Pembayaran</h3>
                            </div>

                            <div class="card-body">
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
                                        <th>Id Pembayaran</th>
                                        <th>Id Reservasi</th>
                                        <th>Total Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody class="table-striped">
                                        <tr>
                                            @forelse ($payment as $pay)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pay->id }}</td>
                                                <td>{{ $pay->reservation_id }}</td>
                                                <td>{{ $pay->total }}</td>
                                                <td>{{ $pay->updated_at }}</td>
                                                <td>
                                                    <div class="row mb-1 text-align-center">

                                                        @if ($pay->payment_status == 'Menunggu')
                                                            <span class="status-kuning"> {{ $pay->payment_status }} </span>
                                                        @endif
                                                        @if ($pay->payment_status == 'Gagal')
                                                            <span class="status-merah">{{ $pay->payment_status }}
                                                            </span>
                                                        @endif
                                                        @if ($pay->payment_status == 'Ditolak')
                                                            <span class="status-oren"> {{ $pay->payment_status }}
                                                            </span>
                                                        @endif
                                                        @if ($pay->payment_status == 'Terbayar')
                                                            <span class="status-hijau">{{ $pay->payment_status }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('pembayaran-edit', $pay->id) }}" class="btn btn-primary">Detail</a>
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
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable();

        });
    </script>
@endpush
