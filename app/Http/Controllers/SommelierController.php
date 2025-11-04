<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;

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
        $user = auth()->user();

        $validatedData = request()->validate([
            'type_grape' => 'required|string',
            'temperature' => 'required|string'
        ]);

        Wine::create($validatedData);

        return response()->json(['message'=> 'the wine has been created']);

    }

    public function blend()
    {
        $wine = Wine::all();
        return view('SommelierArea.maitre', compact('wine'));
    }

    public function vintage(Request $request, int $id)
    {
        $user = auth()->user();

        $wine = Wine::find($id);

        if (!$wine) {
            return response()->json(['message' => 'Wine cannot be updated.'], 404);
        }

        $validatedData = request()->validate([
            'type_grape' => 'required|string|max:255',
            'temperature' => 'required|string|max:255',
        ]);

        $wine->update($validatedData);

        return redirect()->route('sommelier.area')->with('success', 'Wine updated successfully');
    }

}

