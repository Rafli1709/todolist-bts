<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


