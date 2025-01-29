<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak QR Code</title>
    <style>
        @media print {
            body {
                text-align: center;
            }
            img {
                max-width: 80%;
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <h1>QR Code untuk Soal</h1>
    <img src="{{ asset('storage/qr-codes/' . $path) }}" alt="QR Code">
    <button onclick="window.print()">Print</button>
</body>
</html>
