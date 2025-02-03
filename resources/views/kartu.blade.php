<!DOCTYPE html>
<html>
<head>
    <title>Kartu Soal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Pengaturan untuk kertas A4 */
        @page {
            size: A4;
            margin: 20mm;
        }

        @media print {
            body {
                background-color: white;
                font-size: 12px;
                -webkit-print-color-adjust: exact; /* Paksa background agar tetap tercetak */
                print-color-adjust: exact;
            }

            table {
                width: 100%;
                border: none;
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
            }

            td {
                border: none;
                padding: 10px;
                width: 50%;
                height: 200px;
                vertical-align: top;
                background: url('/images/tcard1.png') no-repeat center;
                background-size: cover !important; /* Memastikan gambar menyesuaikan ukuran kartu */
                color: black; /* Pastikan teks tetap terlihat */
            }
        }

        /* Tampilan normal di layar */
        table {
            width: 100%;
            border: none;

        }

        td {
            border: none;

            padding: 10px;
            width: 50%;
            height: 200px;
            vertical-align: top;
            position: relative; /* Untuk memastikan img di dalamnya bisa bertindak sebagai background */
            background: url('/images/tcard1.png') no-repeat center;
            background-size: cover;
            color: black;
        }

        /* Tambahkan gambar sebagai elemen latar belakang */
        .background-img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            opacity: 0.5;
            visibility: visible !important;
        }


        h2 {
            font-size: 16px;
        }

        p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Kartu Bagian Depan</h1>
    <table>
        @foreach($soals->chunk(2) as $chunk)
        <tr>
            @foreach($chunk as $soal)
            <td style="position: relative; width: 50%; height: 200px; text-align: center;">
    <img src="{{ $qrCodePath }}" alt="QR Code" style="width: 200px; height: 200px;">
            </td>
            @endforeach
        </tr>
        @endforeach
    </table>
</body>
</html>
