<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\OcrController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [OcrController::class, 'processImage'])->name('upload');
Route::post('/extract-text', [OcrController::class, 'extractTextFromPdf']);
Route::post('/detect-text', [ImageController::class, 'detectText']);
