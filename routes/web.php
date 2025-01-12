<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\LanguageMiddleware;
 


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/team',function(){
    return view('team');
});

Route::get('/language-switch',[LanguageController::class,'languageSwitch'])->name('language.switch');

