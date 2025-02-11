<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('/', [SampleController::class, 'index']);