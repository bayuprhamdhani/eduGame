<?php

namespace App\Observers;

use App\Models\Question;
use Illuminate\Support\Facades\File;

class QuestionObserver
{
    /**
     * Handle the Question "created" event.
     */
    public function created(Question $question): void
    {
        // Pastikan ID sudah ada
        if (!$question->id) {
            return;
        }

        // Buat URL tujuan untuk QR Code
        $url = route('simulation', [
            'question' => $question->question,
            'time' => $question->time,
            'answer' => $question->answer,
            'chalenge' => $question->chalenge,
        ]);

        // Nama file berdasarkan ID question
        $fileName = $question->id . ".png";
        $filePath = public_path("qr-codes/" . $fileName);

        // Buat folder jika belum ada
        if (!File::exists(public_path("qr-codes"))) {
            File::makeDirectory(public_path("qr-codes"), 0777, true, true);
        }

        // Unduh QR Code dari API dan simpan ke folder lokal
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($url);
        file_put_contents($filePath, file_get_contents($qrCodeUrl));

        // Simpan path QR Code ke database
        $question->path = "qr-codes/" . $fileName;
        $question->saveQuietly(); // Gunakan saveQuietly untuk menghindari infinite loop di observer
    }
}
