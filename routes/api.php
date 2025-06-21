<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/search', [ApiController::class, 'search']);
Route::get('/get-data', [ApiController::class, 'getData']);
