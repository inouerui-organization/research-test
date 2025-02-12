<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('/{id}', [SampleController::class, 'index']);