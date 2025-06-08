
<div class="p-6 text-white bg-gradient-to-b from-[#0c0c0c] via-[#1A1A1A] to-[#0c0c0c] text-[#D8D3C3] min-h-screen">

    {{-- ✅ Message flash --}}
    @if (session()->has('message'))
        <div class="mb-4 text-green-400 bg-green-900 p-3 rounded-xl shadow">
            {{ session('message') }}
        </div>
    @endif

    {{-- 🔍 Barre de recherche + filtre + bouton ajout --}}

        <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
            <input type="text"
                wire:model.debounce.300ms="search"
                wire:keydown.enter="triggerSearch"
                placeholder="Rechercher"
                class="w-full px-4 py-2 pl-10 bg-[#1A1A1A] text-[#D8D3C3] placeholder-gray-400 border border-[#433611] rounded-xl shadow-inner shadow-black/40 focus:outline-none focus:ring-2 focus:ring-[#A9842C] focus:border-none transition duration-300">


        <select wire:model="filterCategory"
                class="p-2 rounded-xl bg-gray-800 text-white border border-[#7B5E1F]">
            <option value="">Civilisations</option>
            <option value="Égypte Antique">Égypte Antique</option>
            <option value="Grèce Antique">Grèce Antique</option>
            <option value="Rome Antique">Rome Antique</option>
            <option value="Artisanat Africain">Artisanat Africain</option>
            <option value="Objets d’Océanie">Objets d’Océanie</option>
            <option value="Art Amérindiens">Art Amérindiens</option>
            <option value="Art précolombiens">Art précolombiens</option>
            <option value="Civilisation Atlante">Civilisation Atlante</option>
        </select>
        <button wire:click="triggerSearch" class="...">Rechercher</button>

        <button wire:click="$set('showFormModal', true)"
                class="bg-[rgb(67,54,17)] text-white px-4 py-2 rounded border-[#7B5E1F] shadow hover:bg-[#7B5E1F] transition">
            Ajouter un artefact
        </button>
        </div>

    {{-- 🖼️ Grille des articles --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($articles as $article)
            <div class="bg-[#1A1A1A] border border-[#433611] rounded-xl shadow-xl hover:scale-[1.02] transition duration-300 overflow-hidden backdrop-blur-sm bg-opacity-60">

                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="h-40 w-full object-cover">
                <div class="p-4 space-y-2">
                    <h3 class="text-lg font-bold">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-400">{{ $article->locality }} • {{ $article->category }}</p>
                    <p class="text-md font-semibold">{{ number_format($article->price, 2, ',', ' ') }} €</p>

                    <div class="flex gap-2 text-xs font-medium">
                        <span class="px-2 py-1 rounded-full 
                            @if($article->status === 'available') bg-[#4C5F39] text-[#D8D3C3]
                            @elseif($article->status === 'sold') bg-[#7F1D1D] text-[#F4EBD0]
                            @else bg-[#A9842C] text-black @endif shadow shadow-black/30 ring-1 ring-white/10">
                            {{ ucfirst($article->status) }}
                        </span>
                        <span class="px-2 py-1 rounded-full bg-[#2C3E50] text-[#D8D3C3] shadow shadow-black/30 ring-1 ring-white/10">
                            {{ ucfirst($article->type) }}
                        </span>
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button wire:click="edit({{ $article->id }})" class="text-blue-400 hover:underline">✏️</button>
                        <button wire:click="confirmDelete({{ $article->id }})" class="text-red-400 hover:underline">🗑️</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-400">Aucun article trouvé.</p>
        @endforelse
    </div>

    {{-- 📄 Pagination --}}
    <div class="mt-8">
        {{ $articles->links() }}
    </div>

    {{-- 🧾 Formulaire modal --}}
    @if($showFormModal)
        <div class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-[#1A1A1A] text-[#D8D3C3] border border-[#433611] p-6 rounded-2xl shadow-2xl w-full max-w-xl relative ring-2 ring-[#7B5E1F]/20">
                <h2 class="text-xl font-serif font-bold mb-4 tracking-wider border-b border-[#7B5E1F]/30 pb-2">
                    {{ $articleId ? '🛠️ Modifier un artefact' : '✨ Ajouter un artefact' }}
                </h2>

                <form wire:submit.prevent="save" class="space-y-4">
                    @foreach (['title'=>'Titre', 'locality'=>'Localité', 'category'=>'Catégorie', 'price'=>'Prix (€)', 'image'=>'Image'] as $field => $placeholder)
                        <div>
                            <input type="{{ $field === 'price' ? 'number' : 'text' }}"
                                wire:model.defer="{{ $field }}"
                                placeholder="{{ $placeholder }}"
                                class="w-full p-2 rounded-xl bg-[#0c0c0c] border border-[#433611]/50 focus:ring-2 focus:ring-[#A9842C] transition" />
                            @error($field) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endforeach

                    <div>
                        <textarea wire:model.defer="description" placeholder="Description"
                            class="w-full p-2 rounded-xl bg-[#0c0c0c] border border-[#433611]/50 focus:ring-2 focus:ring-[#A9842C]"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <select wire:model.defer="status"
                                class="w-full p-2 bg-[#0c0c0c] border border-[#433611]/50 rounded-xl text-[#D8D3C3]">
                            <option value="">Statut</option>
                            <option value="available">Disponible</option>
                            <option value="sold">Vendu</option>
                            <option value="in_cart">Dans un panier</option>
                        </select>

                        <select wire:model.defer="type"
                                class="w-full p-2 bg-[#0c0c0c] border border-[#433611]/50 rounded-xl text-[#D8D3C3]">
                            <option value="">Type de vente</option>
                            <option value="immediate">Achat immédiat</option>
                            <option value="auction">Enchère</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button" wire:click="resetForm"
                                class="px-4 py-2 bg-[#7B5E1F] text-[#F4EBD0] rounded-xl hover:bg-[#A9842C] transition">Annuler</button>
                        <button type="submit"
                                class="px-4 py-2 bg-[#4C5F39] text-[#F4EBD0] rounded-xl hover:bg-[#6B8E23] transition">
                            {{ $articleId ? 'Mettre à jour' : 'Créer' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif


    {{-- 🗑️ Confirmation suppression --}}
    @if($confirmingDeleteId)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md text-center">
                <p class="mb-4 text-black">⚠️ Etes-vous sûr de vouloir supprimer cet article ?</p>
                <div class="flex justify-center gap-4">
                    <button wire:click="$set('confirmingDeleteId', null)" class="px-4 py-2 bg-[#7B5E1F] text-[#F4EBD0] rounded-xl">Annuler</button>
                    <button wire:click="delete" class="px-4 py-2 bg-[#7F1D1D] text-[#F4EBD0] rounded-xl">Oui, supprimer</button>
                </div>
            </div>
        </div>
    @endif
</div>

