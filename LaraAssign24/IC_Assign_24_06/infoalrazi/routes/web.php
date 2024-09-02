<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkExperienceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/experience', [WorkExperienceController::class, 'index'])->name('experience');
Route::get('/project', [ProjectController::class, 'index'])->name('projects');

Route::get('/contact', function () {
    return view('contact');
});