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
        return view ('Wage.newbox');
    }

    public function store()
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        $validatedata = request()->validate([
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

        Ware::create($validatedata);

        return response()->json(['message'=> 'the wine has been created'], 201);

    }

    public function deposit()
    {
        return view('Wage.feature');
    }
    //

    public function max(Request $request, int $id)
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.
        $Ware = Ware::find($id);

        if(!$Ware){
            return response()->json(['register not found'],404);
        }

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
        return view('Wage.refuse');
    }
    //

    public function scrap(Request $request, int $id)
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        $Ware = Ware::find($id);

        if(!$Ware){
            return response()->json(['register not found'],404);
        }

       $ware = delete();

        return responde()->json(['the wine of register has been deleted'],404);
        

        if (empty ($supply) || empty ($bottle) || empty ($age)
            || empty ($temperature)|| empty ($wine_type)){
            return response()->json(['message'=> 'all fields are required to delete.'], 401);
        }

    }
}
