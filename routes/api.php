<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoItemController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('checklist', ChecklistController::class);
    Route::apiResource('todo-item', TodoItemController::class);
});


require __DIR__ . '/auth.php';
