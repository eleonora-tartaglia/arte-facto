<section id="galerie" class="py-16 px-8" data-aos="fade-up">
        <h2 class="text-3xl font-cinzel text-center mb-10">Galerie d'Objets Authentiques</h2>
        <div class="swiper-container h-[40vh]">
            <div class="swiper-wrapper">
                @foreach ($articles as $article)
                    <div class="swiper-slide">
                        <a href="{{ route('articles.show', $article) }}">
                            <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-contain rounded-xl shadow-md hover:scale-105 transition">
                            <div class="text-center mt-2 text-sm">{{ $article->title }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>