<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::group(['prefix' => 'projects'], static function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/{project}', [ProjectController::class, 'index'])->name('project');
});

Route::group(['prefix' => 'plans'], static function () {
   Route::get('/', [PlansController::class, 'index'])->name('plans');
//   Route::get('/{plan}', [PlansController::class, 'index'])->name('plans.index');
});

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::post('/contact', [ContactUsController::class, 'index'])->name('contact');

