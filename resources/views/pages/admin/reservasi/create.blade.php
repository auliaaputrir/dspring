@extends('layouts.admin')
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
                                <h3 class="card-title" style="border-bottom: 5px;">Tambah Reservasi</h3>
                            </div><!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">

                                <form method="post" action="{{ route('reservasi-store-admin') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="name">Nama</b> </label>
                                            </div>
                                            <div class="col-1">
                                                <b>:</b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" id='name'
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    name='name' required></textarea>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
                                                    <option value="1"
                                                        {{ old('floor_number') === '1' ? 'selected' : '' }}>1
                                                    </option>
                                                    <option value="2"
                                                        {{ old('floor_number') === '2' ? 'selected' : '' }}>2
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
                                                <select name="period"
                                                    class="form-control @error('period') is-invalid @enderror"
                                                    id="period">
                                                    <option value="" disabled selected>Periode</option>
                                                    <option value="Bulanan"
                                                        {{ old('period') === 'Bulanan' ? 'selected' : '' }}>
                                                        Bulanan</option>
                                                    <option value="Tahunan"
                                                        {{ old('period') === 'Tahunan' ? 'selected' : '' }}>
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
                                                    class="form-control @error('stay_date') is-invalid @enderror"
                                                    name="stay_date" id="stay_date"
                                                    min="{{ Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-foot">
                                        <button type="submit" class="btn status-hijau float-right">Simpan</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
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

@endpush