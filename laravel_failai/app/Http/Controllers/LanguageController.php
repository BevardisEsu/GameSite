<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    function setLanguage($lang) {
        // Check if the requested language is supported
        if (!in_array($lang, ['en', 'lt'])) {
            return false;
        }

        // Set the application locale
        app()->setLocale($lang);

        // Store the language preference in the session
        session()->put('locale', $lang);

        return true;
    }
}
