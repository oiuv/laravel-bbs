<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        $app = app();
        dd($app);
        return view('pages.root');
    }
}
