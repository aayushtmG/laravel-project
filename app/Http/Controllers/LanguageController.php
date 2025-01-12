<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function languageSwitch(Request $request){
        $lang = $request->query('language');
        Session::put('locale', $lang);
        return back();
    }
}
