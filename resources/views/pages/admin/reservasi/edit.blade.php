<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Reservasi</title>
</head>
<body>
    <form method="post" action="{{ route('reservasi-update', $reservasi->id) }}">
        @csrf
        @method('patch')
        <label for="reservation_status">Status Reservasi</label>
        <select name="reservation_status" id="reservation_status" value="{{ $reservasi->reservation_status }}">
            <option value="Diterima" {{ $reservasi->reservation_status === 'Diterima' ? 'selected' : '' }}>Diterima</option>        
            <option value="Ditolak"{{ $reservasi->reservation_status === 'Ditolak' ? 'selected' : '' }}>Ditolak </option>
        </select>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>