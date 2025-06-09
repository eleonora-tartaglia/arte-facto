<x-layouts.app title="Mon Panier">
    <x-slot name="content">
        <div class="max-w-6xl mx-auto px-8 py-16 space-y-16 bg-black rounded-xl shadow-inner">

            {{-- 🧺 Titre luxueux --}}
            <h1 class="text-4xl font-extrabold tracking-tight" style="color: rgb(67,54,17);">
                🧺 Mon Panier
            </h1>

            {{-- ✨ Messages flash --}}
            @if (session('success'))
                <div class="p-4 bg-green-700 text-white rounded shadow-md">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="p-4 bg-red-700 text-white rounded shadow-md">{{ session('error') }}</div>
            @endif

            @php $total = 0; @endphp

            {{-- 🎨 Articles du panier --}}
            @forelse($cartItems as $item)
                @php
                    $article = $item->article;
                    $total += $article->price;
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-neutral-900 border border-neutral-700 rounded-xl shadow-lg p-6">
                    
                    {{-- Image stylisée --}}
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ $article->image }}"
                             alt="{{ $article->title }}"
                             class="w-full h-auto object-cover transition-transform duration-700 hover:scale-105 rounded-lg shadow-md">
                    </div>

                    {{-- Détails raffinés --}}
                    <div class="text-left space-y-4 text-gray-200">
                        <h2 class="text-3xl font-semibold text-white">{{ $article->title }}</h2>
                        <ul class="space-y-1 text-lg">
                            <li><strong>Prix :</strong> {{ number_format($article->price, 2) }} €</li>
                            <li><strong>Lieu :</strong> {{ $article->locality }}</li>
                            <li><strong>Catégorie :</strong> {{ $article->category->name }}</li>
                            <li><strong>Type :</strong> {{ $article->type === 'immediate' ? 'Achat direct' : 'Aux enchères' }}</li>
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

                        {{-- Boutons d'action --}}
                        <div class="mt-6 flex flex-col sm:flex-row gap-4">
                            {{-- Supprimer --}}
                            <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded shadow">
                                    ❌ Retirer
                                </button>
                            </form>

                            {{-- Valider l'achat --}}
                            @if($article->status !== 'sold')
                                <form method="POST" action="{{ route('order.confirm', $item->id) }}">
                                    @csrf
                                    <button type="submit"
                                            class="px-4 py-2 bg-emerald-700 hover:bg-emerald-800 text-white rounded shadow">
                                        ✅ Valider l'achat
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 italic text-lg">Votre panier est vide. Aucun artefact n’a encore été réservé.</p>
            @endforelse

            {{-- 🧮 Total élégamment affiché --}}
            @if ($cartItems->count() > 0)
                <div class="text-right text-white text-2xl font-medium border-t border-neutral-700 pt-8">
                    Total : {{ number_format($total, 2, ',', ' ') }} €
                </div>
            @endif

            {{-- Retour --}}
        </div>
    </x-slot>
</x-layouts.app>
