<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar Standar</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Pemesanan Kamar Standar</h1>

    @if (session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <h2>Form Pemesanan Kamar</h2>
    <form action="{{ route('pemesanan-kamar-standar.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required maxlength="50">
        </div>
        <div>
            <label for="id_kamar">Kamar:</label>
            <select id="id_kamar" name="id_kamar" required>
                @foreach ($kamarStandar as $kamar)
                <option value="{{ $kamar->id }}">{{ $kamar->nomor_kamar }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tanggal_checkin">Tanggal Check-in:</label>
            <input type="date" id="tanggal_checkin" name="tanggal_checkin" required>
        </div>
        <div>
            <label for="tanggal_checkout">Tanggal Check-out:</label>
            <input type="date" id="tanggal_checkout" name="tanggal_checkout">
        </div>
        <button type="submit">Simpan</button>
    </form>

    <hr>

    <h2>Daftar Pemesanan Kamar</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Checkout</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesananKamarStandar as $pemesanan)
            <tr>
                <td>{{ $pemesanan->nama }}</td>
                <td>{{ $pemesanan->kamarStandar->nomor_kamar }}</td>
                <td>{{ $pemesanan->tanggal_checkin }}</td>
                <td>{{ $pemesanan->tanggal_checkout ?: '-' }}</td>
                <td>
                    @if (!$pemesanan->tanggal_checkout)
                    <button class="checkout-btn" data-id="{{ $pemesanan->id }}">Checkout</button>
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- JavaScript section -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Menggunakan axios untuk mengirim permintaan POST ke server saat tombol Checkout diklik
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.checkout-btn');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const reservationId = this.getAttribute('data-id');
                    axios.post(`/pemesanan-kamar-standar/${reservationId}/checkout`)
                        .then(response => {
                            console.log(response.data);
                            alert('Checkout berhasil.');
                            window.location.reload(); // Refresh halaman setelah checkout berhasil
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Gagal melakukan checkout. Silakan coba lagi.');
                        });

                });
            });
        });
    </script>
</body>

</html>