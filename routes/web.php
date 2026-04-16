<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf-form', function () {
    return view('pdf.form');
});

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
