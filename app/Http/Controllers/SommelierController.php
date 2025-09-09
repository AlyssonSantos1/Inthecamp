<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SommelierController extends Controller
{
    public function index()
    {
        return view('SommelierArea.index');
    }
}
