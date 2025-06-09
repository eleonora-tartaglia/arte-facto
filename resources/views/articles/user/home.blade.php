<x-layouts.app :title="'Accueil connecté'">
    {{-- Hero, intro, carousel, etc. --}}
    @include('components.nav-top')
    @include('components.nav-categories')
    @include('components.hero')
    @include('components.intro')
    @include('components.carousel')
    @include('components.histoire')

    {{-- Barre de catégories --}}
    @isset($showCategoryBar)
        <nav class="bg-[#1A1A1A] py-4 px-6 flex flex-wrap justify-center gap-6 text-sm uppercase tracking-widest border-t border-[#7B5E1F]/30 shadow-inner">
            @foreach ($categories as $category)
                <a href="{{ route('user.civilisations', ['category' => $category->name]) }}"
                   class="hover:text-[#A9842C] transition">
                    {{ $category->name }}
                </a>
            @endforeach
        </nav>
    @endisset

    <h1 class="text-3xl font-bold text-center my-6">
        {{ $categoryName ?? 'Galerie des civilisations' }}
    </h1>

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

    @include('components.footer')
</x-layouts.app>
