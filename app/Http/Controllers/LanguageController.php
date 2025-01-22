<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function languageSwitch($language){
        // $lang = $request->query('language');
        
        Session::put('locale', $language);
        return back();
    }
}
