<x-layouts.guest :title="$article->title">
    <x-slot name="content">
        <div class="max-w-6xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            {{-- Image immersive --}}
            <div class="relative group overflow-hidden rounded-lg shadow-xl">
                <img src="{{ $article->image }}"
                     alt="{{ $article->title }}"
                     class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black opacity-30 group-hover:opacity-10 transition-opacity duration-500"></div>
            </div>

            {{-- Cartel d'exposition --}}
            <div class="bg-black/40 p-8 rounded-lg shadow-md border border-gray-700 text-gray-100">
                <h1 class="text-4xl font-bold mb-6">{{ $article->title }}</h1>
                <ul class="space-y-2 text-lg">
                    <li><strong>Prix :</strong> {{ $article->price }} €</li>
                    <li><strong>Lieu :</strong> {{ $article->locality }}</li>
                    <li><strong>Catégorie :</strong> {{ $article->category }}</li>
                    <li><strong>Type :</strong> {{ $article->type }}</li>
                    <li><strong>Statut :</strong> {{ $article->status }}</li>
                </ul>
                <hr class="my-6 border-gray-600">
                <div class="text-base leading-relaxed italic text-gray-300 animate-fade-in">
                    {{ $article->description }}
                </div>
                <div class="mt-8">
                    <a href="{{ route('civilisations.index') }}"
                       class="inline-block px-4 py-2 bg-white text-black rounded hover:bg-gray-100 transition">← Retour à la galerie</a>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.guest>
