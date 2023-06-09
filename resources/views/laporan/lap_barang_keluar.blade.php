<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan penjualan</title>
</head>
<body>
    <h2>Data Pelaporan Barang Keluar</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Staff</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang_keluar as $item)
                <tr>
                    <td>{{ $item->nama_staff }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga_satuan }}</td>
                    <td>{{ $item->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>