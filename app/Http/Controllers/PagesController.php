<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        $app = app();
        dd($app->getLoadedProviders());
        return view('pages.root');
    }
}
