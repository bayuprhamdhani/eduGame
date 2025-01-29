<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Support\Facades\Storage;
use PDF; // Untuk menghasilkan PDF

class KartuController extends Controller
{
    public function printQRCode($lesson)
    {
        // Ambil semua questions berdasarkan lesson
        $questions = Question::where('lesson', $lesson)->get();
    
        // Jika tidak ada data yang ditemukan
        if ($questions->isEmpty()) {
            return response()->json(['error' => 'No questions found for this lesson'], 404);
        }
    
        // Buat PDF dengan QR Code untuk setiap question
        $qrCodes = [];
        foreach ($questions as $question) {
            $filePath = public_path($question->path); // path dari QR code
    
            // Periksa apakah file QR Code ada
            if (file_exists($filePath)) {
                // Masukkan file QR Code ke dalam array
                $qrCodes[] = $filePath;
            }
        }
    
        // Jika tidak ada QR Code yang ditemukan
        if (empty($qrCodes)) {
            return response()->json(['error' => 'No QR codes found for this lesson'], 404);
        }
    
        // Kirimkan file QR Code sebagai zip (untuk mengunduh banyak file)
        $zipFileName = 'qrcodes_lesson_' . $lesson . '.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
    
        // Membuat file ZIP
        $zip = new \ZipArchive;
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
            foreach ($qrCodes as $qrCode) {
                $zip->addFile($qrCode, basename($qrCode));
            }
            $zip->close();
        }
    
        // Kirimkan file ZIP untuk diunduh
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
    
}
