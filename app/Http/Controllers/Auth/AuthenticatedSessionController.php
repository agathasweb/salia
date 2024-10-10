<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        // Tente buscar o usuário pelo email
        $user = Auth::getProvider()->retrieveByCredentials($request->only('email'));

        // Verifique se o usuário existe e se está ativo
        if (!$user || !$user->is_active) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Este usuário não está ativado.']);
        }

        // Autentica o usuário
        $request->authenticate();

        // Regenera a sessão se o usuário estiver ativo
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
