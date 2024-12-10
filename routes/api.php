<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\TodoItemController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('checklist', ChecklistController::class);
    Route::apiResource('todo-item', TodoItemController::class);
});

require __DIR__ . '/auth.php';
