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

    public function store()
    {
        $User = auth()->user();
        //if $user =  Sale as a model to indicates 
        //continue.

        $User = request()->validate([
            'supply' => 'required|string',
            'bottle' => 'required|string',
            'age' => 'required|string',
            'price' => 'required|string',
            'temperature' => 'required|string',
            'wine_type' => 'required|string'
        ]);

        Ware::Create([
            

        ]);

    }
}
