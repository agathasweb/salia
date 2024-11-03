<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CustomPasswordResetMail; // Adicione esta linha
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail; // Adicione esta linha
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Encontre o usuário pelo e-mail
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {
            // Gere um token para redefinição de senha
            $token = Password::createToken($user);

            // Envie o e-mail de redefinição de senha
            Mail::to($user->email)->send(new CustomPasswordResetMail($token, $user->email));
        }

        return back()->with('status', 'Um link de redefinição de senha foi enviado para seu e-mail!');


    }
}
