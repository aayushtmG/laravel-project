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
    //fetch from database
    $members=collect( [
        [
            'name'=> 'Mahendra Kumar Giri',
            'position'=> 'Chief Executive',
            'email'=>'ceo@saharanepal.ccop.np',
            'image'=>'/path-to-image.jpg',
        ],
        [
            'name'=> 'Laxman Khatiwada',
            'position'=> 'Director',
            'email'=>'director@saharanepal.ccop.np',
            'image'=>'/path-to-image.jpg',
        ],
        [
            'name'=> 'Dinesh Bahadur Niraula',
            'position'=> 'Deputy Director',
            'email'=>'admin@saharanepal.ccop.np',
            'image'=>'/path-to-image.jpg',
        ],
        [
            'name'=> 'Ishwor Prasad Bhattarai',
            'position'=> 'Assistant Director',
            'email'=>'audit@saharanepal.ccop.np',
            'image'=>'/path-to-image.jpg',
        ]
        ]);
    return view('team',compact('members'));
});

Route::get('/language-switch',[LanguageController::class,'languageSwitch'])->name('language.switch');

