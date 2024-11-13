<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function toggleLang($lang)
    {
        session()->forget('lang');
        session()->put('lang',$lang);
        return redirect()->back();
    }
}