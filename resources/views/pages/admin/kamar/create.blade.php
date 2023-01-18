@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kamar</h1>
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
                    <h3 class="card-title" style="border-bottom: 5px;">Tambah Data Kamar</h3>
                </div><!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('kamar-store') }}">
                    @csrf
                    <div class="card-body">
                        {{-- Nomor Kamar --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="room_number">Nomor Kamar</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="room_number"
                                        class="form-control @error('room_number') is-invalid @enderror" id="room_number"
                                        value="{{ old('room_number') }}" required>
                                    @error('Nomor Kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Lantai Kamar --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="floor_number">Lantai :</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="floor_number"
                                        class="form-control @error('floor_number') is-invalid @enderror"
                                        id="floor_number">
                                        <option value="" disabled selected>Lantai</option>
                                        <option value="1" {{ old('floor_number') === '1' ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2" {{ old('floor_number') === '2' ? 'selected' : '' }}>2
                                        </option>
                                    </select>
                                    @error('Lantai Kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Harga --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="price">Harga</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        value="{{ old('price') }}" required>
                                    @error('Harga')
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
                                    <label for="description">Deskripsi</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <textarea id='description' style="width: 100%; height: 170px; resize: none;" class="form-control @error('description') is-invalid @enderror" name='description' required></textarea>
                                    @error('Deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- status --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="room_status">Status Kamar</label>
                                </div>
                                <div class="col-1">
                                    <b>:</b>
                                </div>
                                <div class="col-9">
                                    <select name="room_status"
                                        class="form-control @error('room_status') is-invalid @enderror" value
                                        id="floor_number">
                                        <option value="" disabled selected>Status Kamar</option>
                                        <option value="Tersedia" {{ old('room_status') === 'Tersedia' ? 'selected' : '' }}>Tersedia
                                        </option>
                                        <option value="Terpesan"
                                            {{ old('room_status') === 'Terpesan' ? 'selected' : '' }}>Terpesan
                                        </option>
                                    </select>
                                    @error('Status Kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-foot">
                            <button type="submit" class="btn status-hijau float-right">Simpan</button>
                        </div>
                        
                </form>
            @endsection
