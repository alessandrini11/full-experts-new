<?php

use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IntegrerequipeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ApprouveController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\ViewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


   Route::get('/pourquoi_nous_choisir', function () {
    return view('site.aprop1.template');
   });

   Route::get('/qui_sommes_nous', function () {
    return view('site.aprop2.template');
   });
   Route::get('/qui_sommes_nous', function () {
    return view('site.aprop2.template');
   });

//    Route::get('/dashboards', function () {
//     return view('full-expert2.dashboard.index');
//    });


   Route::get('/', [ExpertController::class, 'index']);

   Route::post('/valid', [ExpertController::class, 'create']);

   Route::get('/service', [ProspectController::class, 'index']);

   Route::post('/service_valid', [ProspectController::class, 'create']);

   Route::get('/', [IntegrerequipeController::class, 'index']);

   Route::post('/equipe_valid', [IntegrerequipeController::class, 'create']);

   Route::get('/contacts', [ContactController::class, 'index']);

   Route::post('/contacts_valid', [ContactController::class, 'create']);

   Route::get('/gestion_souscription', [ViewController::class, 'expert']);

   Route::get('/views_service', [ViewController::class, 'prospect']);

   Route::get('/gestion_reclamation', [ViewController::class, 'equipe']);

   Route::get('/contactez_nous', [ViewController::class, 'contact']);

   Route::get('/gestion_sinistre', [ViewController::class, 'approuve']);

   Route::get('/delete_equipe/{id}', [ViewController::class, 'delete_equipe']);

   Route::get('/delete_expert/{id}', [ViewController::class, 'delete_expert']);

   Route::get('/delete_service/{id}', [ViewController::class, 'delete_service']);

   Route::get('/delete_contact/{id}', [ViewController::class, 'delete_contact']);

   Route::get('/delete_approuve/{id}', [ViewController::class, 'delete_approuve']);

   Route::get('/download-pdf/{cv}', [ViewController::class, 'downloadPDF'])->name('download.pdf');

   Route::post('/approuve', [ApprouveController::class, 'index'])->name('approuve');

   Route::get('/admin_login', [AdminAuthController::class, 'showLoginForm']);

   Route::post('/login_valid', [AdminAuthController::class, 'login']);
