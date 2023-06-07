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
                <th>Nama Staff</th>
                <th>No Telepon</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->no_telepon }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
