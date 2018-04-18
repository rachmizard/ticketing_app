<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandler extends Controller
{
    public function error404()
    {
    	return view('error.404');
    }
}
