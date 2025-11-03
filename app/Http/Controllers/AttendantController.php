<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;


class AttendantController extends Controller
{


    public function index()
    {
        return view('SellerArea.index');
    }

    public function create()
    {
        return view ('SellerArea.seller', compact('sale'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validatedData = request()->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        Sale::create($validatedData);

        return response()->json(['message'=> 'the ask has been created']);

    }

    public function booking(int $id)
    {
        $sale = Sale::find($id);
        return view('SellerArea.merchant', compact('sale'));
    }

    public function transaction (Request $request, int $id)
    {
        $user = auth()->user();

        $sale = Sale::find($id);

         $request->validatedData([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        $sale->read($validatedData);

        
    }
    //

    public function asks(int $id)
    {
        $sale = Sale::findOrFail($id);
        return view('SellerArea.merchant', compact('sale'));
    }

    public function orders (Request $request, int $id)
    {
        $user = auth()->user();

        $sale = Sale::findOrFail($id);

        $validatedData = $request->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        $sale->update($validatedData);        

        return response()->json(['message'=> 'the wine has been updated']);
        
    }
    //

    public function trash(int $id)
    {
        $sale = Sale::find($id);
        return view('SellerArea.trash', compact('sale'));
    }

    public function exclusion(Request $request, int $id)
    {
        $user = auth()->user();

        $sale = Sale::find($id);

         if(!$sale){
            return response()->json(['asks cannot be deleted!,'],404);
        }
        
         $request->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

  
        $sale->delete($validatedData);

        response()->json(['message'=> 'all fields are required to delete.'], 401);

    }
}
