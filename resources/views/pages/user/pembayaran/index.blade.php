<!DOCTYPE html>
<html>
    <head>
       <title>Pembayaran</title>
    </head>
    <body>
        
        <form method="POST" action="{{ route('pembayaran-create', $reservasi->id) }}" enctype="multipart/form-data">
            @csrf
            <label for="id_reservasi">ID Reservasi</label>:
            <input type="text" name="id_reservasi" value="{{ $reservasi->id }}"><br>
            <label for="room_number">Nomor Kamar</label>:
            <input type="text" name="room_number" id="room_number" value="{{ $reservasi->rooms->room_number }}"><br>
            <label for="period">Periode</label> : 
            <input type="text" id='period' name='period' value="{{ $reservasi->period }}"><br>
            <label for="stay_date">Tanggal Masuk :</label>
            <input type="text" value="{{ $reservasi->stay_date }}"><br>
            <label for="total">Total: </label>
            <input type="text" name="total" id="total" value="{{ $reservasi->rooms->price }}"><br>
            <label for="image">Bukti Pembayaran</label>
            <input type="file" id="image" name="image">:<br>
            <button type="submit">Simpan</button>
            
           
        </form>
    </body>
</html>