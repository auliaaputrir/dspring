<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Reservasi</title>
</head>
<body>
    <form method="post" action="{{ route('pembayaran-update', $payment->id) }}">
        @csrf
        @method('patch')
        <label for="payment_status">Status Reservasi</label>
        <select name="payment_status" id="payment_status" value="{{ $payment->payment_status }}">
            <option value="Terbayar" {{ $payment->payment_status === 'Terbayar' ? 'selected' : '' }}>Terbayar</option>        
            <option value="Ditolak"{{ $payment->payment_status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>