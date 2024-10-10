<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate($token)
    {
        // Lógica para ativar o usuário
        $user = User::where('activation_token', $token)->first();

        if ($user) {
            $user->is_active = true; // Ativa o usuário
            $user->activation_token = null; // Limpa o token
            $user->save();

            return redirect()->route('login')->with('status', 'Conta ativada com sucesso!');
        }

        return redirect()->route('login')->with('error', 'Token de ativação inválido.');
    }
}
