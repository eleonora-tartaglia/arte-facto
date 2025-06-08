<section class="py-16 px-8 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}" class="rounded-2xl overflow-hidden shadow-lg bg-white transition transform hover:scale-105">
            <img src="{{ asset('storage/' . $article->image_path) }}"
                 alt="{{ $article->titre }}"
                 class="h-64 w-full object-cover">

            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ $article->titre }}</h2>
                <p class="text-gray-600 line-clamp-3">{{ $article->description }}</p>
                <div class="mt-2 text-indigo-600 font-bold text-lg">{{ number_format($article->prix, 2, ',', ' ') }} €</div>
            </div>
        </a>
    @endforeach
</section>
