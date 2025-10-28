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
        return view('SommelierArea.sommelier');
    }

    public function regulation(Request $request)
    {
        $User = auth()->user();

        $validatedata = request()->validate([
            'type_grape' => 'requested|string',
            'temperature' => 'requested|string'
        ]);

        Wine::Create([
            'type_grape' =>$type_grape,
            'temperature' => $temperature
        ]);

        Wine::create($validatedata);

        return responde()->json(['message'=> 'the wine has been created']);

    }

    public function blend()
    {
        return view('SommelierArea.maitre');
    }

    public function vintage(Request $request, int $id)
    {
        $User = auth()->user();
        //requires to user on login is a sommelier worker
        //if no returns to login menu
        $Wine = Wine::find($id);

        if(!$Wine){
            return response()->json(['Wine cannot updated,'],404);
        }

        Wine::update([
            'type_grape' =>$type_grape,
            'temperature' => $temperature
        ]);

        if (empty ($type_grape) || empty ($temperature)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }

    
    }



}

