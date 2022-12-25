<!DOCTYPE html>
<html>
    <head>
        Edit kamar
    </head>
    <body>
        
        <form method="post" action="{{ route('kamar-update', $room->id) }}">
            @csrf
            @method('patch')
            <label for="room_number">Nomor Kamar</label>:
            <input type="text" name="room_number" id="room_number" value="{{ $room->room_number }}"><br>
            <label for="floor_number">Lantai</label>:
            <select name="floor_number" value="{{ $room->floor_number }}" id="floor_number">
                    <option value="1" {{ $room->room_status === '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $room->room_status === '2' ? 'selected' : '' }}>2</option>
            </select><br>
            <label for="price">Harga</label> : 
            <input type="text" id='price' name='price' value="{{ $room->price }}"><br>
            <label for="description">Deskripsi</label>
            <textarea id='description' name='description'>{{ $room->description }}</textarea><br>
            <label for="room_status">Lantai</label>:
            <select name="room_status" id="room_status">
                    <option value="Ada" {{ $room->room_status === 'Ada' ? 'selected' : '' }}>Ada</option>
                    <option value="Tidak Ada" {{ $room->room_status === 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
            </select><br>
            <button type="submit">Simpan</button>

           
        </form>
    </body>
</html>