<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
// session_start();

class LanguageController extends Controller
{
    //
    public function index(Request $request, $language)
    {
        if ($language) {
            Session::put('language', $language);
        }
        return redirect()->back();
    }
}
