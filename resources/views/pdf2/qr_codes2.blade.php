<!DOCTYPE html>
<html>
<head>
    <title>QR Codes for Lesson {{ $questions->first()->lesson }}</title>
    <style>
        /* Mengatur orientasi halaman menjadi landscape */
        @page {
            size: landscape; /* Mengatur orientasi menjadi landscape */
            margin: 0; /* Menghilangkan margin default */
        }

        body { font-family: Arial, sans-serif; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td { 
            width: 20%; /* Mengatur lebar kolom menjadi 20% untuk 5 kolom per baris */
            height: 35%; /* Menambahkan tinggi kolom sebesar 10% */
            text-align: center; 
            vertical-align: middle; 
            background-image: url('{{ public_path('images/dcard1.png') }}'); /* Gambar sebagai background */
            background-size: cover; /* Menyesuaikan ukuran gambar */
            border: 2px solid #000; /* Border hitam untuk setiap kolom */
        }
        .qr-container { display: inline-block; text-align: center; }
        img { 
            width: 100px; 
            height: 100px; 
            margin-top: 65px; /* Menggeser gambar ke bawah sebesar 15px */
        }
    </style>
</head>
<body>
    <h2>QR Codes for Lesson: {{ $questions->first()->lesson }}</h2>
    
    <table>
        @foreach($questions->chunk(5) as $chunk) <!-- Mengubah jumlah kolom per baris menjadi 5 -->
            <tr>
                @foreach($chunk as $question)
                    <td>
                        <div class="qr-container">
                        </div>
                    </td>
                @endforeach
                
                <!-- Jika jumlah item di baris ini kurang dari 5, tambahkan sel kosong dengan background gambar -->
                @if($chunk->count() < 5)
                    @for($i = $chunk->count(); $i < 5; $i++)
                        <td></td>
                    @endfor
                @endif
            </tr>
        @endforeach
    </table>
</body>
</html>
