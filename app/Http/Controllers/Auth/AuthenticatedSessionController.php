<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    // Mostrar tela de login
    public function create()
    {
        return view('auth.login'); // Breeze padrão
    }

    // Processar login
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('owner')->attempt($credentials)) {
            $request->session()->regenerate();

            $owner = Auth::guard('owner')->user();
            session(['owner' => $owner]); // opcional, mas mantido

            $role = strtolower(trim($owner->function));

            // Redirecionamento conforme função, fallback para '/'
            switch ($role) {
                case 'sommelier':
                    return redirect()->route('sommelier.area'); 
                case 'inventory':
                    return redirect()->route('inventory.area');
                case 'attendant':
                    return redirect()->route('attendant.area');
                default:
                    return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
