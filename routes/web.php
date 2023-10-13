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
Route::get('/briefcomunicacion', [App\Http\Controllers\CommunicationsController::class, 'index'])->name('comunicacion');
Route::get('/briefcomunicacion/{id}', [App\Http\Controllers\CommunicationsController::class, 'show']);
Route::post('/briefcomunicacion', [App\Http\Controllers\CommunicationsController::class, 'store']);

//Generador de Brief comunicación en PDF
Route::get('/comunicacion/pdf', [App\Http\Controllers\CommunicationsController::class, 'generatePDF'])->name('pdf_comunicación');

// Rutas para los briefs creativos y de campañas
Route::get('/briefcreativo', [App\Http\Controllers\CampaignsController::class, 'index'])->name('creativo');
Route::get('/briefcreativo/{id}', [App\Http\Controllers\CampaignsController::class, 'show']);
Route::post('/briefcreativo', [App\Http\Controllers\CampaignsController::class, 'store']);

//Generador de Brief creativo en PDF
Route::get('/creativo/pdf', [App\Http\Controllers\CampaignsController::class, 'generatePDF'])->name('pdf_creativo');

// Rutas para los briefs de desarrollo web
Route::get('/briefdesarrollo', [App\Http\Controllers\DevelopmentController::class, 'index'])->name('desarrollo');
Route::get('/briefdesarrollo/{id}', [App\Http\Controllers\DevelopmentController::class, 'show']);
Route::post('/briefdesarrollo', [App\Http\Controllers\DevelopmentController::class, 'store']);

//Generador de Brief desarrollo web en PDF
Route::get('/desarrollo/pdf', [App\Http\Controllers\DevelopmentController::class, 'generatePDF'])->name('pdf_desarrollo');