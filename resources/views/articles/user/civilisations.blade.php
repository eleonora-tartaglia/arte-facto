<x-layouts.app :title="'Catalogue des œuvres'">
    <div class="p-8 text-[#D8D3C3] bg-[#0c0c0c] min-h-screen font-serif">
        <h1 class="text-3xl font-bold text-center my-6">Galerie des civilisations</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-8">
            @foreach ($articles as $article)
                <a href="{{ route('user.articles.show', $article->id) }}"
                   class="bg-[#1f1f1f] p-4 rounded-xl hover:scale-105 transform transition duration-300 shadow-lg">
                    <img src="{{ $article->image }}"
                         alt="{{ $article->title }}"
                         class="w-full h-48 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
                    <p class="text-sm text-gray-400 mb-2">{{ Str::limit($article->description, 100) }}</p>
                    <p><strong>Prix :</strong> {{ $article->price }} €</p>
                    <p><strong>Lieu :</strong> {{ $article->locality }}</p>
                    <p><strong>Statut :</strong> {{ $article->status }}</p>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.app>
