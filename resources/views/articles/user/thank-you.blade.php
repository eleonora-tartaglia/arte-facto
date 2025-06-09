<x-layouts.app title="✨ Relique acquise avec succès">
    <x-slot name="content">
        <div class="max-w-5xl mx-auto px-8 py-20 text-center text-white space-y-12" style="background-color: #000;">

            {{-- Titre chic et bronze --}}
            <h1 class="text-4xl font-extrabold tracking-wide animate-pulse" style="color: rgb(67, 54, 17);">
                Merci pour votre confiance.
            </h1>

            {{-- Paragraphe élégant et mystérieux --}}
            <p class="text-lg text-gray-300 italic leading-relaxed">
                La transaction a été confirmée. L’artefact que vous avez choisi est désormais vôtre.<br class="hidden md:block">
                Il repose à présent dans un écrin dédié, en attente de sa transmission à votre collection privée.
            </p>

            {{-- Mini fiche article achetée --}}
            @isset($article)
                <div class="bg-black/40 border border-gray-700 rounded-xl shadow-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    {{-- Image --}}
                    <div class="overflow-hidden rounded-lg shadow-inner group">
                        <img src="{{ $article->image }}"
                             alt="{{ $article->title }}"
                             class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105 rounded-lg">
                    </div>

                    {{-- Description --}}
                    <div class="text-left space-y-4 text-gray-200">
                        <h2 class="text-3xl font-semibold text-white">{{ $article->title }}</h2>
                        <ul class="space-y-1 text-lg">
                            <li><strong>Prix :</strong> {{ $article->price }} €</li>
                            <li><strong>Lieu :</strong> {{ $article->locality }}</li>
                            <li><strong>Catégorie :</strong> {{ $article->category->name }}</li>
                            <li><strong>Type :</strong> {{ $article->type === 'immediate' ? 'Achat direct' : 'Aux enchères' }}</li>
                        </ul>
                        <p class="italic text-sm text-gray-400 mt-4">{{ $article->description }}</p>
                    </div>
                </div>
            @endisset

            {{-- Bouton retour --}}
            <div class="mt-8">
                <a href="{{ route('user.civilisations') }}"
                   class="inline-block px-5 py-3 bg-white text-black rounded hover:bg-gray-100 transition font-medium shadow">
                    ← Explorer d'autres artefacts
                </a>
            </div>

            {{-- Signature élégante --}}
            <p class="mt-12 text-sm text-gray-500 italic">
                — L’équipe Arte Facto, gardienne des pièces d’exception
            </p>

        </div>
    </x-slot>
</x-layouts.app>
