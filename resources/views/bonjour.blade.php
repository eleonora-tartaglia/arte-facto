<x-layouts.app :title="'Gestion des articles'">
    <div class="p-6 text-[#D8D3C3] bg-[#0c0c0c] min-h-screen font-sans">

        {{-- Invoquer le composant Livewire du crud des articles --}}
        @livewire('article-index')

    </div>
</x-layouts.app>
