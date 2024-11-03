<?php

namespace App\Livewire;

use App\Models\Template;
use Livewire\Component;

class TemplateGrid extends Component
{
    public $templates;

    public function mount()
    {
        $this->templates = Template::all();
    }

    public function loadTemplate($templateId)
    {
        $template = Template::find($templateId);

        if ($template) {
            // Utilizar dispatch ao invés de emit para Livewire 3
            $this->dispatch('loadTemplate', content: $template->content);
        }
    }


    public function render()
    {
        return view('livewire.template-grid');
    }
}
