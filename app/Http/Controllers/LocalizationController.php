<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\TranslationLoader\LanguageLine;


class LocalizationController extends Controller
{
    // public function index(Request $request,$locale){
    //     Session::put('my_locale', $locale);
    //     Session::save();
    //     return redirect()->back();
    // }
    public function update_language($locale){
        App::setLocale($locale);
        return redirect()->back();
    }
}
