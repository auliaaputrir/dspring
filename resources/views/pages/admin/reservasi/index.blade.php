<!DOCTYPE html>
<html>
    <head>Data Reservasi</head>
    <body>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($reservasi as $r)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->rooms->room_number }}</td>
                    <td>{{ $r->users->name }}</td>
                    <td>{{ $r->period }}</td>
                    <td>{{ $r->stay_date }}</td>
                    <td>{{ $r->reservation_status}}</td>
                    <td><a href="{{ route('reservasi-edit', $r->id) }}">Edit</a></td>
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