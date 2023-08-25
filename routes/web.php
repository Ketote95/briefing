<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para los briefs de comunicación
Route::get('/BriefComunicación', [App\Http\Controllers\CommunicationsController::class, 'index'])->name('comunicacion');
Route::get('/BriefComunicación/{id}', [App\Http\Controllers\CommunicationsController::class, 'show']);
Route::post('/BriefComunicación', [App\Http\Controllers\CommunicationsController::class, 'store']);

//Generador de Brief comunicación en PDF
Route::get('/Comunicación/pdf', [App\Http\Controllers\CommunicationsController::class, 'generatePDF'])->name('pdf_comunicación');