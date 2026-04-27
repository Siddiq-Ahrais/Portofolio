<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

// Public API endpoints for React frontend
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);

// Contact form submission
Route::post('/messages', [MessageController::class, 'store']);
