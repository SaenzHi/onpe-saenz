<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OnpeController;

Route::controller(OnpeController::class)->group(function () {
    Route::get('grupo_votacion/{grupo_votacion}', 'grupo_votacion');
});
