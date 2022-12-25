<!DOCTYPE html>
<html>
    <head>
       <title>Pembayaran</title>
    </head>
    <body>
        
        <form method="POST" action="{{ route('pembayaran-create', $reservasi->id) }}" enctype="multipart/form-data">
            {{-- apabila inputan otamotis terisi oleh sistem, mohon dibatasi dengan readonly agar value tidak bisa diubah2 oleh user --}}
            @csrf
            <label for="room_number">Nomor Kamar</label>:
            <input type="text" name="room_number" id="room_number" value="{{ $reservasi->rooms->room_number }}" readonly><br>
            <label for="period">Periode</label> : 
            <input type="text" id='period' name='period' value="{{ $reservasi->period }}" readonly><br>
            <label for="stay_date">Tanggal Masuk :</label>
            <input type="text" value="{{ $reservasi->stay_date }}" readonly><br>
            <label for="total">Total: </label>
            <input type="text" name="total" id="total" value="@if($reservasi->period == 'Bulanan'){{ $reservasi->rooms->price }}@else{{ $reservasi->rooms->price*12 }}@endif" readonly><br>
            <label for="image">Bukti Pembayaran</label>
            <input type="file" id="image" name="image">:<br>
            <button type="submit">Upload</button>
            
           
        </form>
    </body>
</html>