<?php

use App\Http\Controllers\AfiliadoController;
use Illuminate\Support\Facades\Route;

Route::resource('afiliados', AfiliadoController::class)->except(['show']);
