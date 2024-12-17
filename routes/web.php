<?php

use App\Http\Controllers\AchievmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PpdbController;
use Doctrine\DBAL\Schema\Index;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use League\Csv\Query\Row;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// ROUTE DAFTAR SISWA
Route::get('/ppdb/register', function () {
    return view('auth.register');
});
Route::post('/ppdb/register', [AuthController::class, 'register'])->name('register');

// ROUTE PPDB
Route::get('/ppdb/login', [AuthController::class, 'showLoginForm'])->name('ppdb.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE PENDAFTARAN
Route::get('/ppdb/pendaftaran', [PpdbController::class, 'showForm'])
    ->middleware('auth')
    ->name('ppdb.pendaftaran.biodata-siswa');
Route::get('/ppdb/pendataran-biodata-orangtua', [PpdbController::class, 'showBiodataOrangtua'])->name('biodata-orangtua');
Route::post('/ppdb/pendataran-biodata-orangtua', [PpdbController::class, 'saveBiodataOrangtua'])->name('save-biodata-orangtua');
Route::get('/ppdb/input-nilai', [PpdbController::class, 'showFormInputNilai'])->name('input-nilai');
Route::post('/ppdb/daftar', [PpdbController::class, 'saveBiodataSiswa'])->name('saveBiodataSiswa');
Route::get('/ppdb/index', [PpdbController::class, 'showPpdbIndex'])->name('ppdb.index');



Route::get('/achievment', [AchievmentController::class, "index"]);

Route::get('/activity', function(){
    return view('activity');
});



Route::get('/tes-notif', function () {
    try {
        $recipient = auth()->Auth::user()();

        Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);

        Log::info("Notification create by: " . $recipient);
    } catch (\Exception $e) {
        Log::info($e->getMessage());
    }
});

Route::get('/logout', function(){
    Auth::logout();
      return redirect('/login');});