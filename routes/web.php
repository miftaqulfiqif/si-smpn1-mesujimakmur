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

Route::get('/ppdb/login', function () {
    return view('auth.login');
});
Route::post('/login', AuthController::class, 'login')->name('login');
Route::post('/logout', AuthController::class, 'logout');

Route::get('/ppdb/register', function () {
    return view('auth.register');
});

Route::post('/ppdb/register', [AuthController::class, 'register'])->name('register');


Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/achievment', [AchievmentController::class, "index"]);

Route::get('/activity', function(){
    return view('activity');
});


Route::get('/ppdb/pendaftaran', [PpdbController::class, 'index'])->name('ppdb.index');

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