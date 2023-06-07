<!DOCTYPE html>
<html>
<head>
    <title>Data</title>
</head>
<body>
    <h1>Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->harga }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
