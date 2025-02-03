<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KartuController;
use Illuminate\Support\Facades\Response;

Route::get('/download/pdf/{lesson}', [KartuController::class, 'downloadPDF'])->name('download.pdf');

Route::get('/download-qrcode', function () {
    $url = route('simulation', [
        'question' => request('question'),
        'time' => request('time'),
        'answer' => request('answer')
    ]);

    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($url);

    // Ambil gambar dari API GoQR
    $image = file_get_contents($qrCodeUrl);

    // Simpan sementara dan kirim sebagai file download
    return Response::make($image, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'attachment; filename="simulation_qrcode.png"'
    ]);
})->name('download.qrcode');
Route::get('/print-qrcode/{lesson}', [KartuController::class, 'printQRCode'])->name('print.qrcode');

Route::get('/kartu/cetak', [KartuController::class, 'cetak'])->name('kartu.cetak');
Route::get('/', function () {
    return view('welcome');
});
Route::get('question', [QuestionController::class, 'create'])->name('question');
Route::get('question2', [QuestionController::class, 'create2'])->name('question2');
Route::get('index', [QuestionController::class, 'index'])->name('index');
Route::get('print', [QuestionController::class, 'print'])->name('print');
Route::get('simulation', [QuestionController::class, 'simulation'])->name('simulation');
Route::get('/questions/preview/{lesson}', [QuestionController::class, 'preview'])->name('preview');
Route::post('post-question', [QuestionController::class, 'store'])->name('question.post');
Route::post('post-question2', [QuestionController::class, 'store2'])->name('question.post2');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard2', [DashboardController::class, 'index2'])->name('dashboard2');
Route::get('about', [DashboardController::class, 'about'])->name('about');
Route::get('contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('registrationUser', [AuthController::class, 'registration'])->name('registerUser');
Route::post('post-registrationUser', [AuthController::class, 'postRegistration'])->name('registerUser.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
