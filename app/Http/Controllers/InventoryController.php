<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
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
        $user = auth()->user();

        $validatedData = request()->validate([
            'supply' => 'required|string',
            'bottle' => 'required|string',
            'age' => 'required|string',
            'price'  => 'required|string',
            'temperature' => 'required|string',
            'wine_type' => 'required|string'
        ]);


        Stock::create($validatedData);

        return response()->json(['message'=> 'the wine has been created'], 201);

    }

    public function deposit()
    {
        $stock = Stock::all();
        return view('Wage.feature', compact('stock'));
    }
    //

    public function max(Request $request, int $id)
    {
        $user = auth()->user();

        $stock = Stock::find($id);

        if(!$stock){
            return response()->json(['register not found'],404);
        }
        
        $validatedData = request()->validate([
            'supply' => 'required|string',
            'bottle' => 'required|string',
            'age' => 'required|string',
            'price'  => 'required|string',
            'temperature' => 'required|string',
            'wine_type' => 'required|string'
        ]);

        $stock->update($validatedData);

        return response()->json(['message'=> 'the wine has been updated'], 201);
    }

    public function garbage(int $id)
    {
        $stock = Stock::findOrFail($id);
        return view('Wage.refuse', compact('stock'));
    }
    //

    public function scrap(Request $request, int $id)
    {
        $user = auth()->user();
    
        $stock = Stock::findOrFail($id);

        if(!$stock){
            return response()->json(['register not found'],404);
        }

        $stock = delete();

        return responde()->json(['the wine of register has been deleted'],404);

    }
}
