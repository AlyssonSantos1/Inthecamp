<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

          if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $employer = Auth::user();
            
            session(['' => $w]);
           
            switch (strtolower(trim($member->hierarchy))) {
                case 'executive':
                    return redirect()->route('executive.index');
                case 'internaladvisor':
                    return redirect()->route('internaladvisor.index');
                case 'manager':
                    return redirect()->route('managers.index');
                case 'associate':
                    return redirect()->route('associates.index');
                case 'user':
                    return redirect()->route('user.index');
                default:
                    return redirect()->intended('/');
            }
            
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas são inválidas.',
        ]);

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
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
