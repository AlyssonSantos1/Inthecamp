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

    // criar a funcao onde a view vai retornar na tela pro usuario

    //criar a funcao porem verificar se ele é um vendedor/seller como uma condicao no caso if e puxar
    // a sessao onde ta esses dados no caso a model

    public function create(Request $request)
    {
        return view ('SellerArea.seller.blade.php');
    }

    public function store(Request $request)
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        $User = request()->validate([
            'amount' => 'required|string',
            'price' => 'required|string',
            'type_bottle' => 'required|string'
        ]);

        Sale::create([
        'amount' => $amount,
        'price' => $price,
        'type_bottle' => $type_bottle

        ]);

        if (empty ($amount) || empty ($price) || empty ($type_bottle)){
            return response()->json(['message'=> 'all fields are required.'], 401);
        }
    }

    public function booking(Request $request)
    {
        return view('SellerArea.merchant.blade.php');
    }

    public function transaction (Request $request)
    {
        Sale::read([
        'amount' => 'required|string',
        'price' => 'required|string',
        'type_bottle' => 'required|string'

        ]);
    }

    public function asks(Request $request)
    {
        return view('SellerArea.merchant.blade.php');
    }

    public function orders (Request $request)
    {
        Sale::update([
        'amount' => 'required|string',
        'price' => 'required|string',
        'type_bottle' => 'required|string'

        ]);
    }
}
