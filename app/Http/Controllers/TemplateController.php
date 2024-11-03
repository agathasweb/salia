<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template; // Altere para o nome correto do seu modelo

class TemplateController extends Controller
{
    public function saveTemplate(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'content' => 'required|string',
        ]);

        // Criação do novo template
        $template = new Template();
        $template->title = $request->title;
        $template->group = $request->group;
        $template->tags = $request->tags;
        $template->content = $request->content;
        $template->user_id = auth()->id(); // Supondo que o usuário está autenticado
        $template->created_at = now();
        $template->updated_at = now();
        $template->save();

        return response()->json(['success' => true]);
    }
}
