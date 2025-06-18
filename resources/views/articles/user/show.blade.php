<x-layouts.app :title="$article->title">
    <x-slot name="content">
        <div class="bg-[#0c0c0c] min-h-screen px-6 py-20 text-gray-200 font-serif">
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
                        <li><strong>Catégorie :</strong> {{ $article->category->name }}</li>
                        <li><strong>Type :</strong> {{ $article->type }}</li>
                        <li><strong>Statut :</strong>
                            @if($article->status === 'sold')
                                <span class="text-red-400">Vendu</span>
                            @elseif($article->status === 'in_cart')
                                <span class="text-yellow-400">Dans un panier</span>
                            @else
                                <span class="text-green-400">Disponible</span>
                            @endif
                        </li>
                    </ul>

                    <hr class="my-6 border-gray-600">

                    <div class="text-base leading-relaxed italic text-gray-300 animate-fade-in">
                        {{ $article->description }}
                    </div>

                    {{-- Affichage conditionnel des actions --}}
                    @if ($article->status === 'sold')
                        <p class="text-red-500 text-lg mt-6 font-semibold italic">
                            Cet artefact a déjà été acquis par un collectionneur.
                        </p>
                    @else
                    @if (isset($inOtherCarts) && $inOtherCarts > 0)
                        <p class="text-yellow-400 text-sm italic mt-4 text-center">
                            ⚠️ {{ $inOtherCarts }} utilisateurs ont ajouté cet article à leur panier.
                        </p>
                    @endif

                        <div class="flex justify-center mt-6">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <button type="submit"
                                        class="px-6 py-3 rounded-lg text-white font-semibold shadow-lg hover:scale-105 transition"
                                        style="background-color: rgb(67,54,17);">
                                    🧺 Ajouter au panier
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
