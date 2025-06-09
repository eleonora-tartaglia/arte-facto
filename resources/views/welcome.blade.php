<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Arte Facto' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Polices et styles -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-[#0c0c0c] text-[#D8D3C3] font-sans">

    @include('components.nav-top')
    @include('components.nav-categories')
    @include('components.hero')
    @include('components.intro')
    @include('components.carousel')
    @include('components.histoire')
    @include('components.footer')

    <div x-data="{ open: false }" class="p-4">
        <button @click="open = !open" class="bg-[#433611] text-white px-4 py-2 rounded">
            Toggle test
        </button>

        <div x-show="open" class="mt-4 p-2 bg-[#1A1A1A] text-[#D8D3C3] rounded">
            Alpine fonctionne ! ✨
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
</body>
</html>