<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dasa Wisma</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Laporan Data Dasa Wisma</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dasa Wisma</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Dusun</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dawisList as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_dawis }}</td>
                    <td>{{ $item->rt }}</td>
                    <td>{{ $item->rw }}</td>
                    <td>{{ $item->dusun }}</td>
                    <td>{{ $item->tahun }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>