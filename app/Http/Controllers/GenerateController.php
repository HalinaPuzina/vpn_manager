<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generate;

class GenerateController extends Controller
{
    //
    public function index()
    {
        set_time_limit(3600);
        Generate::run();
        return response()->json(null, 200);
    }
}
