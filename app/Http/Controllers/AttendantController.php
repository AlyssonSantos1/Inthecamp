<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view ('SellerArea.seller');
    }

    public function store(Request $request)
    {
        $User = auth()->user();

        $validatedData = request()->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        Sale::create([
            'amount' => $amount,
            'price' => $price,
            'type_bottle' => $type_bottle

        ]);

        Sale::create($validatedData);

        return responde()->json(['message'=> 'the ask has been created']);

    }

    public function booking(int $id)
    {
        $sale = Sale::find($id);
        return view('SellerArea.merchant', compact('Sale'));
    }

    public function transaction (Request $request)
    {
        $sale = Sale::find($id);

         $request->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        $sale->read([
            'amount' => $amount,
            'price' => $price,
            'type_bottle' => $type_bottle

        ]);

        
    }
    //

    public function asks(int $id)
    {
        $sale = Sale::find($id);
        return view('SellerArea.merchant', compact('Sale'));
    }

    public function orders (Request $request, int $id)
    {

        $sale = Sale::find($id);

        if(!$Sale){
            return response()->json(['ask not updated,'],404);
        }

        $request->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        $sale->update([
            'amount' => $amount,
            'price' => $price,
            'type_bottle' => $type_bottle

        ]);

        return response()->json(['message'=> 'all fields are required to update.'], 401);
        
    }
    //

    public function trash(int $id)
    {
        $sale = Sale::find($id);
        return view('SellerArea.trash', compact('sale'));
    }

    public function exclusion(Request $request, int $id)
    {

        $sale = Sale::find($id);

         if(!$sale){
            return response()->json(['asks cannot be deleted!,'],404);
        }
        
         $request->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        $sale->delete([
            'amount' => $amount,
            'price' => $price,
            'type_bottle' => $type_bottle

        ]);

        $sale->delete();

        response()->json(['message'=> 'all fields are required to delete.'], 401);

    }
}
