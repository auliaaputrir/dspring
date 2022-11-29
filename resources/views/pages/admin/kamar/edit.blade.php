<!DOCTYPE html>
<html>
    <head>
        Tambah kamar
    </head>
    <body>
        
        <form method="post" action="{{ route('kamar-update', $room->id) }}">
            @csrf
            @method('patch')
            <label for="room_number">Nomor Kamar</label>:
            <input type="text" name="room_number" id="room_number" value="{{ $room->room_number }}"><br>
            <label for="floor_number">Lantai</label>:
            <select name="floor_number" value="{{ $room->floor_number }}" id="floor_number">
                    <option value="" disabled selected>Lantai</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
            </select><br>
            <label for="price">Harga</label> : 
            <input type="text" id='price' name='price' value="{{ $room->price }}"><br>
            <label for="description">Deskripsi</label>
            <textarea id='description' name='description'>{{ $room->description }}</textarea><br>
            <label for="room_status">Lantai</label>:
            <select name="room_status" id="room_status" value="{{ $room->room_status }}">
                    <option value="" disabled selected>Status Kamar</option>
                    <option value="Ada ">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
            </select><br>
            <button type="submit">Simpan</button>

           
        </form>
    </body>
</html>