<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna Dasa Wisma</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
            color: #5a67d8;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
        }

        img.logo {
            width: 100px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            animation: fadeIn 0.5s ease-in;
        }

        thead {
            background-color: #5a67d8;
            color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 600px) {

            th,
            td {
                padding: 10px;
            }

            h1,
            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <img src="{{ public_path('images/logo-jepara.png') }}" alt="Logo Jepara" class="logo">
    <h1>Daftar Pengguna</h1>
    <h2>Dasa Wisma Kabupaten Jepara</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Tanggal Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>