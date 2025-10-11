<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ware;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('Wage.index');
    }

     public function newitem(Request $request)
    {
        return view ('Wage.newbox.blade.php');
    }

    public function store()
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        $User = request()->validate([
            'supply' => 'required|string',
            'bottle' => 'required|string',
            'age' => 'required|string',
            'temperature' => 'required|string',
            'wine_type' => 'required|string'
        ]);

        Ware::Create([
            'supply' => $supply,
            'bottle' => $bottle,
            'age' =>$age,
            'temperature' => $temperature,
            'wine_type' => $wine_type

        ]);

        if (empty ($supply) || empty ($bottle) || empty ($age)
            || empty ($temperature)|| empty ($wine_type)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }

    }

    public function deposit()
    {
        return view('Wage.ice.blade.php');
    }
    //

    public function max()
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        Ware::update([
            'supply' => $supply,
            'bottle' => $bottle,
            'age' =>$age,
            'temperature' => $temperature,
            'wine_type' => $wine_type

        ]);

        if (empty ($supply) || empty ($bottle) || empty ($age)
            || empty ($temperature)|| empty ($wine_type)){
            return response()->json(['message'=> 'all fields are required to update.'], 401);
        }

    }

    public function garbage()
    {
        return view('Wage.refuse.blade.php');
    }
    //

    public function scrap()
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        Ware::delete([
            'supply' => $supply,
            'bottle' => $bottle,
            'age' =>$age,
            'temperature' => $temperature,
            'wine_type' => $wine_type

        ]);

        if (empty ($supply) || empty ($bottle) || empty ($age)
            || empty ($temperature)|| empty ($wine_type)){
            return response()->json(['message'=> 'all fields are required to update.'], 401);
        }

    }
}
