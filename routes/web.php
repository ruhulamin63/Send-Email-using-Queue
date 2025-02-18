<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MailController::class, 'index']);
Route::post('send-mail', [MailController::class, 'sendMail']);
