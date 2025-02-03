<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login
use PDF; // Untuk menghasilkan PDF
use ZipArchive;

class KartuController extends Controller
{
    public function printQRCode($lesson)
    {
        // Ambil ID user yang sedang login
        $userId = Auth::id();

        // Ambil semua questions berdasarkan lesson dan user
        $questions = Question::where('lesson', $lesson)
                            ->where('user', $userId) // Tetap gunakan 'user'
                            ->get();
        
        // Jika tidak ada data yang ditemukan
        if ($questions->isEmpty()) {
            return response()->json(['error' => 'No questions found for this lesson and user'], 404);
        }
    
        // Mengecek tipe (type) dari soal pertama untuk menentukan view PDF yang digunakan
        $type = $questions->first()->type;
    
        // Membuat PDF berdasarkan tipe (type)
        if ($type == 1) {
            // Type 1: Menggunakan qr_codes dan qr_codes2
            $pdf1 = PDF::loadView('pdf.qr_codes', compact('questions'));
            $pdf2 = PDF::loadView('pdf.qr_codes2', compact('questions'));
        } else if ($type == 2) {
            // Type 2: Menggunakan qr_codes dari pdf2
            $pdf1 = PDF::loadView('pdf2.qr_codes', compact('questions'));
            $pdf2 = PDF::loadView('pdf2.qr_codes2', compact('questions'));
        } else {
            // Jika type tidak sesuai, kembalikan error
            return response()->json(['error' => 'Invalid question type'], 400);
        }
    
        // Path untuk menyimpan file PDF sementara
        $pdf1Path = public_path('downloads/qr_code_' . $lesson . '_' . $userId . '.pdf');
        $pdf2Path = public_path('downloads/qr_codes2_' . $lesson . '_' . $userId . '.pdf');
    
        // Menyimpan kedua file PDF
        $pdf1->save($pdf1Path);
        $pdf2->save($pdf2Path);
    
        // Membuat file ZIP
        $zipFileName = 'qr_codes_lesson_' . $lesson . '.zip';
        $zipFilePath = public_path('downloads/' . $zipFileName);
        
        // Membuka file ZIP untuk menambahkan file PDF
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($pdf1Path, 'front card of lesson' . $lesson . '.pdf');
            $zip->addFile($pdf2Path, 'back card of lesson' . $lesson . '.pdf');
            $zip->close();
        }
    
        // Menghapus file PDF setelah ditambahkan ke ZIP
        unlink($pdf1Path);
        unlink($pdf2Path);
    
        // Kirimkan file ZIP untuk diunduh
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
