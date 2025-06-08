<x-layouts.app :title="'Tableau de bord Utilisateur'">
    <div class="p-8 min-h-screen bg-[#0c0c0c] text-[#D8D3C3] font-serif space-y-12">

        @php
            $user = auth()->user();
        @endphp

        <h1 class="text-4xl font-bold">
            Bienvenue dans votre espace personnel, 
            <span class="italic text-[#A9842C]">{{ $user->name }}</span> 🧚‍♀️
        </h1>

        <!-- 🧾 Informations utilisateur -->
        <div class="bg-[#1f1f1f]/60 border border-[#7B5E1F]/40 rounded-2xl shadow-lg backdrop-blur-md p-6 max-w-2xl space-y-3">
            <h2 class="text-2xl font-semibold text-[#F4EBD0] mb-3">Vos informations</h2>
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Rôle :</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Membre depuis :</strong> {{ $user->created_at->translatedFormat('d F Y') }}</p>
        </div>

        <!-- 🖼️ Galerie personnelle vide -->
        <div class="space-y-6">
            <h2 class="text-3xl font-serif font-semibold text-[#F4EBD0]">Ma galerie personnelle</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 0; $i < 6; $i++)
                    <div class="rounded-2xl border border-[#433611]/30 bg-[#1a1a1a]/50 backdrop-blur-lg shadow-inner p-6 flex flex-col items-center justify-center text-center text-zinc-400">
                        <p class="text-xl mb-2">Emplacement vide</p>
                        <p class="text-sm italic opacity-60">Un artefact apparaîtra ici bientôt...</p>
                    </div>
                @endfor
            </div>
        </div>

    </div>
</x-layouts.app>
