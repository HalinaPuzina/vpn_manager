<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generate;

class GenerateController extends Controller
{
    //
    public function index()
    {
        Generate::run();
        return response()->json(null, 200);
    }
}
