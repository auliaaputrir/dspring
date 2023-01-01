<!DOCTYPE html>
<html>
    <head>Data Reservasi</head>
    <body>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>No</th>
                <th>Id Pembayaran</th>
                <th>Id Reservasi</th>
                <th>Total Bayar</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($payment as $pay)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pay->id }}</td>
                    <td>{{ $pay->reservation_id }}</td>
                    <td>{{ $pay->total}}</td>
                    <td>{{ $pay->updated_at}}</td>
                    <td>{{ $pay->payment_status }} <a href="{{ route('pembayaran-edit', $pay->id) }}">Edit</a></td>
                    <td><img src="{{ URL('upload/'.$pay->image)}}" alt=""></td>
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