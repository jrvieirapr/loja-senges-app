<?php

use App\Http\Controllers\SiteController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/',[SiteController::class,'index'])
->name('site.home');
