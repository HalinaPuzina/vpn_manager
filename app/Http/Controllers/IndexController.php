<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
 * Class IndexController
 */

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
}
