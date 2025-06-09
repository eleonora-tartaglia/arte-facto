<div x-data="{ open: false }" class="relative">
    {{-- Bouton Civilisations dans la nav principale --}}
    <button @click="open = !open"
            class="hover:text-[#A9842C] transition uppercase tracking-widest text-sm focus:outline-none">
        Civilisations
    </button>

    {{-- BARRE FIXE STYLE NAV PRINCIPALE --}}
    <div x-show="open"
         @click.outside="open = false"
         x-transition
         class="w-full bg-[#1A1A1A] py-4 px-6 border-t border-[#7B5E1F]/30 shadow-inner mt-[-1px] z-30">

        <nav class="max-w-screen-xl mx-auto flex flex-wrap justify-center gap-x-8 gap-y-2 text-sm text-[#D8D3C3] uppercase tracking-widest">
            @foreach ($categories as $category)
                <a href="{{ route('civilisations.index', ['category' => $category->name]) }}"
                   class="hover:text-[#A9842C] px-2 py-1 transition relative group">
                    {{ $category->name }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#A9842C] transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </nav>
    </div>
</div>




<!--   Ici on utilise Alpine.js (x-data, x-show, etc.) pour un menu responsive sans JS lourd. -->