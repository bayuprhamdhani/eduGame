<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('question', [QuestionController::class, 'create'])->name('question');
Route::get('index', [QuestionController::class, 'index'])->name('index');
Route::post('post-question', [QuestionController::class, 'store'])->name('question.post');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('registrationUser', [AuthController::class, 'registration'])->name('registerUser');
Route::post('post-registrationUser', [AuthController::class, 'postRegistration'])->name('registerUser.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
