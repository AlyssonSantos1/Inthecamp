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
        return view ('SellerArea.seller.blade.php');
    }

    public function store(Request $request)
    {
        $User = auth()->user();

        $validatedata = request()->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        Sale::create([
            'amount' => $amount,
            'price' => $price,
            'type_bottle' => $type_bottle

        ]);

        Sale::create($validatedata);

        return responde()->json(['message'=> 'the ask has been created']);

    }

    public function booking()
    {
        return view('SellerArea.merchant.blade.php');
    }

    public function transaction (Request $request)
    {
        $User = auth()->user();

        Sale::read([

        'amount' => $amount,
        'price' => $price,
        'type_bottle' => $type_bottle

        ]);

        if (empty ($amount) || empty ($price) || empty ($type_bottle)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }
    }
    //

    public function asks()
    {
        return view('SellerArea.merchant.blade.php');
    }

    public function orders (Request $request, int $id)
    {
        $User = auth()->user();

        $Sale = Sale::find($id);

        if(!$Sale){
            return response()->json(['ask not updated,'],404);
        }

        Sale::update([
        'amount' => $amount,
        'price' => $price,
        'type_bottle' => $type_bottle

        ]);

        if (empty ($amount) || empty ($price) || empty ($type_bottle)){
            return response()->json(['message'=> 'all fields are required to update.'], 401);
        }
    }
    //

    public function trash()
    {
        return view('trash.blade.php');
    }

    public function exclusion(Request $request, int $id)
    {
        $User = auth()->user();

        $Sale = Sale::find($id);

         if(!$Sale){
            return response()->json(['asks cannot be deleted!,'],404);
        }
        Sale::delete([
        'amount' => $amount,
        'price' => $price,
        'type_bottle' => $type_bottle

        ]);

        if (empty ($amount) || empty ($price) || empty ($type_bottle)){
            return response()->json(['message'=> 'all fields are required to delete.'], 401);
        }
    }
}
