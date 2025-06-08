@props(['title', 'excerpt', 'image', 'category'])

<div class="bg-[#1a1a1a] rounded-xl overflow-hidden shadow-md border border-[#433611] hover:shadow-lg transition duration-300">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    <div class="p-4 text-[#D8D3C3]">
        <p class="text-xs text-[#bfae84] uppercase tracking-wide mb-1">{{ $category }}</p>
        <h2 class="text-xl font-bold mb-2" style="font-family: 'Cinzel', serif;">{{ $title }}</h2>
        <p class="text-sm mb-4" style="font-family: 'Cardo', serif;">{{ $excerpt }}</p>
        <a href="#" class="text-sm text-[#bfae84] hover:underline">Explorer l’artefact →</a>
    </div>
</div>
