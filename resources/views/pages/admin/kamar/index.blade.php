<!DOCTYPE html>
<html>
    <head>Data Kamar</head>
    <body>
        <h4><a href="/admin/kamar-create">Tambah  Kamar</a></h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Lantai</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($rooms as $room)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->floor_number }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->room_status }}</td>
                    <td><a href="{{ route('kamar-edit', $room->id) }}">Edit</a> | <a href="{{ route('kamar-delete', $room->id) }}" onclick="return confirm('Hapus data kamar?')">Hapus</a></td>
                </tr>
                    @empty
                    <tr>
                        <td>
                            Data Kosong
                        </td>
                    </tr> 
                    @endforelse
            </tbody>

        </table>

    </body>
</html>