<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar Standar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Kamar Standar</h1>

        @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('kamar-standar.store') }}" method="POST">
            @csrf
            <div>
                <label for="nomor_kamar">Nomor Kamar:</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" required maxlength="10">
            </div>
            <div>
                <label for="jenis_tempat_tidur">Jenis Tempat Tidur:</label>
                <input type="text" id="jenis_tempat_tidur" name="jenis_tempat_tidur" required maxlength="50">
            </div>
            <div>
                <label for="kapasitas">Kapasitas:</label>
                <input type="number" id="kapasitas" name="kapasitas" required>
            </div>
            <div>
                <label for="ketersediaan">Ketersediaan:</label>
                <input type="number" id="ketersediaan" name="ketersediaan" required value="10">
            </div>
            <button type="submit">Simpan</button>
        </form>

        <h2>Daftar Kamar Standar</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor Kamar</th>
                    <th>Jenis Tempat Tidur</th>
                    <th>Kapasitas</th>
                    <th>Ketersediaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kamarStandar as $kamar)
                <tr>
                    <td>{{ $kamar->nomor_kamar }}</td>
                    <td>{{ $kamar->jenis_tempat_tidur }}</td>
                    <td>{{ $kamar->kapasitas }}</td>
                    <td>{{ $kamar->ketersediaan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>