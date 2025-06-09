@php
    $articleCount = \App\Models\Article::count();
    $userCount = \App\Models\User::count();
    $venteCount = \App\Models\Article::where('status', 'sold')->count();
    $enchereCount = \App\Models\Article::where('type', 'auction')->where('status', '!=', 'sold')->count();
@endphp

<x-layouts.app :title="'Tableau de bord Admin'">
    <div class="p-6 text-[#D8D3C3] bg-[#0c0c0c] min-h-screen font-sans">

        <h1 class="text-4xl font-serif font-bold mb-10 text-[#D8D3C3]">Bienvenue dans le tableau de bord administrateur 🦉</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">
            <!-- ARTICLES -->
            <div class="rounded-2xl bg-[#4B2E19] p-6 text-[#F4EBD0] shadow-xl border border-[#7B5E3C]/40 backdrop-blur-sm">
                <h2 class="text-lg font-semibold tracking-widest uppercase mb-2">Articles</h2>
                <p class="text-5xl font-bold">{{ $articleCount }}</p>
                <p class="text-sm opacity-75 mt-2">Articles présents sur le site</p>
            </div>

            <!-- UTILISATEURS -->
            <div class="rounded-2xl bg-[#2E2D4A] p-6 text-[#EDEBFB] shadow-xl border border-[#6C6AB0]/30 backdrop-blur-sm">
                <h2 class="text-lg font-semibold tracking-widest uppercase mb-2">Utilisateurs</h2>
                <p class="text-5xl font-bold">{{ $userCount }}</p>
                <p class="text-sm opacity-75 mt-2">Utilisateurs enregistrés</p>
            </div>

            <!-- VENTES -->
            <div class="rounded-2xl bg-[#1D3B2C] p-6 text-[#DAFBE5] shadow-xl border border-[#4CAF50]/30 backdrop-blur-sm">
                <h2 class="text-lg font-semibold tracking-widest uppercase mb-2">Ventes</h2>
                <p class="text-5xl font-bold">{{ $venteCount }}</p>
                <p class="text-sm opacity-75 mt-2">Articles vendus</p>
            </div>

            <!-- ENCHÈRES -->
            <div class="rounded-2xl bg-[#4B1E36] p-6 text-[#FBE4F1] shadow-xl border border-[#C97BA6]/30 backdrop-blur-sm">
                <h2 class="text-lg font-semibold tracking-widest uppercase mb-2">Enchères</h2>
                <p class="text-5xl font-bold">{{ $enchereCount }}</p>
                <p class="text-sm opacity-75 mt-2">Enchères en cours</p>
            </div>
        </div>
    </div>
</x-layouts.app>