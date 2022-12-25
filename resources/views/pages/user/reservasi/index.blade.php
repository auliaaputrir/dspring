<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4><a href="/penyewa/reservasi-create">Tambah  Kamar</a></h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Periode Sewa</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($reservasi as $r)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->rooms->room_number }}</td>
                    <td>{{ $r->period }}</td>
                    <td>{{ $r->stay_date }}</td>
                    <td>{{ $r->reservation_status}}</td>
                        @if ($r->reservation_status == 'Menunggu')
                    <td><a href="">Batalkan Pesanan</a></td>        
                        @endif
                        @if ($r->reservation_status == 'Diterima')

                    <td><a href="{{ route('pembayaran', $r->id) }}">Lanjut pembayaran</a></td>
                        @endif
                    {{-- <td><a href="{{ route('kamar-edit', $room->id) }}">Edit</a> | <a href="{{ route('kamar-delete', $room->id) }}" onclick="return confirm('Hapus data kamar?')">Hapus</a></td> --}}
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