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
            @foreach ($staff as $staff)
                <tr>
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->nama_staff }}</td>
                    <td>{{ $staff->no_telepon }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
