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

    public function create()
    {
        return view ('');
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

        Sale::read([

        ]);

    }

}
