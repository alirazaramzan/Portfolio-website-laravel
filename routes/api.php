<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::get('/skills', [SkillController::class, 'index']);
