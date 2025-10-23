<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Jenis Hewan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2 class="mb-4">🐾 Daftar Jenis Hewan</h2>
  <table class="table table-bordered">
      <thead class="table-primary">
          <tr>
              <th>ID</th>
              <th>Nama Jenis</th>
          </tr>
      </thead>
      <tbody>
          @foreach($data as $item)
              <tr>
                  <td>{{ $item->idjenis_hewan }}</td>
                  <td>{{ $item->nama_jenis_hewan }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</body>
</html>   