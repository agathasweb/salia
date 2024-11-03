<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
            {{ __('Painel de Gestão - SAETO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bem vindo ao Saeto Cloud!") }}

                    <livewire:template-grid />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@livewireStyles
@livewireScripts
