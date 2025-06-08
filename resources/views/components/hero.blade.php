<section class="relative h-screen">
        <div class="absolute inset-0 bg-fixed bg-center bg-cover bg-no-repeat"
             style="background-image: url('{{ $image ?? "https://cdn.midjourney.com/1b6d8960-28bb-4a9b-b796-3f4d74f27b13/0_1.png" }}');">
        </div>
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
            <div>
                <h1 class="text-6xl md:text-7xl font-cinzel text-[#F4EEDC] drop-shadow-xl">ARTE FACTO</h1>
                <p class="mt-6 text-xl md:text-2xl font-cardo italic text-[#D8D3C3]">
                    Chaque pièce murmure un passé endormi...
                </p>
                <a href="{{ route('civilisations.index') }}" class="mt-8 inline-block px-6 py-3 border border-[#D8D3C3] hover:bg-[#D8D3C3] hover:text-black transition">Explorer la galerie</a>
            </div>
        </div>
    </section>