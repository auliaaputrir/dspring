halo all
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
                        <input type="date" name="stay_date" id="stay_date">
                        <br><button type='submit'>Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
