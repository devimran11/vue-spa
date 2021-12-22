<?php

use Illuminate\Support\Facades\Route;

Route::get('{any}', function () {
    return view('app');
<<<<<<< HEAD
})->where('any', '[\/\w\.-]*');
=======
})->where('any', '.*');
>>>>>>> 2e2c608f8211534f9c9210bd29910ef3b1db0142

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
