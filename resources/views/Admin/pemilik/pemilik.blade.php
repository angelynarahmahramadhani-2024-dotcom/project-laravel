<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pemilik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2 class="mb-4 text-center text-primary">🐾 Daftar Pemilik Hewan</h2>

  <table class="table table-bordered table-striped text-center align-middle">
      <thead class="table-primary">
          <tr>
              <th>No</th>
              <th>Nama Pemilik</th>
              <th>No. WA</th>
              <th>Alamat</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($pemilik as $index => $item)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $item->user ? $item->user->nama : '-' }}</td>
                  <td>{{ $item->no_wa }}</td>
                  <td>{{ $item->alamat }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</body>
</html>