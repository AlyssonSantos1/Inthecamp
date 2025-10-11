<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SommelierController extends Controller
{
    public function index()
    {
        return view('SommelierArea.index');
    }
    //

    public function oenophile()
    {
        return view('SommelierArea.sommelier.blade.php');
    }

    public function regulation()
    {
        $User = auth()->user();
        //requires to user on login is a sommelier worker
        //if no returns to login menu

        $User = request()->validate([
            'type_grape' => 'requested|string',
            'temperature' => 'requested|string'
        ]);

        Wine::Create([
            'type_grape' =>$type_grape,
            'temperature' => $temperature
        ]);

        if (empty ($type_grape) || empty ($temperature)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }

    }
    //

    public function blend()
    {
        return view('SommelierArea.maitre.blade.php');
    }

    public function vintage()
    {
        {
        $User = auth()->user();
        //requires to user on login is a sommelier worker
        //if no returns to login menu

        Wine::update([
            'type_grape' =>$type_grape,
            'temperature' => $temperature
        ]);

        if (empty ($type_grape) || empty ($temperature)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }

    }
    }



}

