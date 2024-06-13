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

// Rutas para los briefs de creación de marca
Route::get('/briefbranding', [App\Http\Controllers\BrandingController::class, 'index'])->name('branding');
Route::get('/briefbranding/{id}', [App\Http\Controllers\BrandingController::class, 'show']);
Route::post('/briefbranding', [App\Http\Controllers\BrandingController::class, 'store']);

//Generador de Brief creación de marca en PDF
Route::get('/branding/pdf', [App\Http\Controllers\BrandingController::class, 'generatePDF'])->name('pdf_branding');

// Rutas para los briefs de creación de nombre
Route::get('/briefnaming', [App\Http\Controllers\NamingController::class, 'index'])->name('naming');
Route::get('/briefnaming/{id}', [App\Http\Controllers\NamingController::class, 'show']);
Route::post('/briefnaming', [App\Http\Controllers\NamingController::class, 'store']);

//Generador de Brief creación de nombre en PDF
Route::get('/naming/pdf', [App\Http\Controllers\NamingController::class, 'generatePDF'])->name('pdf_naming');

// Rutas para los briefs de producción de fotografía
Route::get('/brief_fotografia', [App\Http\Controllers\FotografiaController::class, 'index'])->name('fotografia');
Route::get('/brief_fotografia/{id}', [App\Http\Controllers\FotografiaController::class, 'show']);
Route::post('/brief_fotografia', [App\Http\Controllers\FotografiaController::class, 'store']);

//Generador de Brief producción de fotografía en PDF
Route::get('/fotografia/pdf', [App\Http\Controllers\FotografiaController::class, 'generatePDF'])->name('pdf_fotografia');

// Rutas para los briefs de producción audiovisual
Route::get('/brief_audiovisual', [App\Http\Controllers\AudiovisualController::class, 'index'])->name('audiovisual');
Route::get('/brief_audiovisual/{id}', [App\Http\Controllers\AudiovisualController::class, 'show']);
Route::post('/brief_audiovisual', [App\Http\Controllers\AudiovisualController::class, 'store']);

//Generador de Brief producción audiovisual en PDF
Route::get('/audiovisual/pdf', [App\Http\Controllers\AudiovisualController::class, 'generatePDF'])->name('pdf_audiovisual');

// Rutas para los briefs de planning digital
Route::get('/brief_planning', [App\Http\Controllers\PlanningController::class, 'index'])->name('planning_digital');
Route::get('/brief_planning/{id}', [App\Http\Controllers\PlanningController::class, 'show']);
Route::post('/brief_planning', [App\Http\Controllers\PlanningController::class, 'store']);

//Generador de Brief planning digital en PDF
Route::get('/planning/pdf', [App\Http\Controllers\PlanningController::class, 'generatePDF'])->name('pdf_planning_digital');

// Rutas para los briefs de planning digital (nuevo cliente)
Route::get('/brief_planning_new', [App\Http\Controllers\PlanningNewController::class, 'index'])->name('planning_digital_new');
Route::get('/brief_planning_new/{id}', [App\Http\Controllers\PlanningNewController::class, 'show']);
Route::post('/brief_planning_new', [App\Http\Controllers\PlanningNewController::class, 'store']);

//Generador de Brief planning digital en PDF
Route::get('/planning_new/pdf', [App\Http\Controllers\PlanningNewController::class, 'generatePDF'])->name('pdf_planning_digital_new');