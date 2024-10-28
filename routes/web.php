<?php

use App\Http\Controllers\PpdbController;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view('auth.login');
});
Route::get('/register', function(){
    return view('auth.register');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/ppdb/pendaftaran', [PpdbController::class, 'index'])->name('ppdb.index');

Route::get('/tes-notif', function () {
    try {
        $recipient = auth()->user();

        Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);

        Log::info("Notification create by: " . $recipient);
    } catch (\Exception $e) {
        Log::info($e->getMessage());
    }
});
