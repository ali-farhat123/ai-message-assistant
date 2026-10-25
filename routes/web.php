<?php
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages/create', [MessageController::class, 'create']);
Route::post('/messages', [MessageController::class, 'store' ]);
Route::get('/messages', [MessageController::class, 'index']);