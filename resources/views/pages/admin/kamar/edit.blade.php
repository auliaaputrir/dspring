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
                    <h3 class="card-title" style="border-bottom: 5px;">Data Kamar</h3>
                </div><!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('kamar-update', $room->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
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
                                        class="form-control" id="room_number"
                                        value="{{ $room->room_number }}">
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
                                        class="form-control" 
                                        id="floor_number">
                                        <option value="1" {{ $room->floor_number === '1' ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2" {{ $room->floor_number === '2' ? 'selected' : '' }}>2
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="price">Harga</label>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col 9">
                                    <input type="text" id='price' class="form-control" name='price'
                                value="{{ $room->price }}">
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
                                    <textarea id='description' style="width: 100%; height: 170px; resize: none;" class="form-control" name='description'>{{ $room->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="room_status">Status </label>
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col 9">
                                    <select name="room_status" class="form-control" id="room_status">
                                        <option value="Ada" {{ $room->room_status === 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada" {{ $room->room_status === 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                </div>
                            </div>
    
                        </div>
                        <div class="card-foot">
                            <button type="submit" class="btn status-hijau float-right">Simpan</button>
                        </div>
                        
                </form>
            </div></div></div></div></div></div>
            @endsection
