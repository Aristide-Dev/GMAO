<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommercialController extends Controller
{
    public function index()
    {
        return view('commercial.index');
    }
}
