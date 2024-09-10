<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Koneksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .offline-message {
            display: none;
            text-align: center;
            padding: 20px;
            background-color: #f44336;
            color: white;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .content {
            padding: 20px;
        }

        .btn-refresh {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-refresh:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="offlineMessage" class="offline-message">
        Anda tidak terhubung ke internet. Harap periksa koneksi Anda.
    </div>

    <div class="content">
        <h1>Selamat Datang</h1>
        <p>Ini adalah halaman utama. Pastikan koneksi internet Anda stabil untuk pengalaman terbaik.</p>
        <a href="#" class="btn-refresh" onclick="checkConnection()">Periksa Koneksi</a>
    </div>

    <script>
        function updateOnlineStatus() {
            const offlineMessage = document.getElementById('offlineMessage');
            if (navigator.onLine) {
                offlineMessage.style.display = 'none';
            } else {
                offlineMessage.style.display = 'block';
            }
        }

        function checkConnection() {
            if (navigator.onLine) {
                alert('Anda terhubung ke internet.');
            } else {
                alert('Anda tidak terhubung ke internet.');
            }
        }

        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);

        // Initial check
        updateOnlineStatus();
    </script>
</body>

</html>