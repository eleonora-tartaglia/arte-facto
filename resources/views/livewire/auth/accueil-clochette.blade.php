<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ARTE FACTO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">

    <!-- AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0c0c0c] text-[#D8D3C3] font-sans">

    <!-- 🧭 Header -->
    <header class="flex justify-between items-center p-6">
        <h1 class="text-3xl font-bold" style="font-family: 'Marcellus', serif; color: #D8D3C3;">ARTE FACTO</h1>
        <div class="space-x-4">
            <a href="/login" class="rounded border border-[rgb(67,54,17)] text-[#D8D3C3] px-6 py-2 hover:bg-[rgb(67,54,17)] hover:text-[#D8D3C3] transition duration-300">Connexion</a>
            <a href="/register" class="rounded border border-[rgb(67,54,17)] text-[#D8D3C3] px-6 py-2 hover:bg-[rgb(67,54,17)] hover:text-[#D8D3C3] transition duration-300">Inscription</a>
        </div>
    </header>

    <!-- 🔽 Navigation -->
    <nav class="bg-[#1A1A1A] py-4 px-6 flex space-x-6 justify-center text-sm uppercase tracking-widest">
        <a href="#" class="hover:underline">Accueil</a>
        <a href="#" class="hover:underline">Reliques</a>
        <a href="#" class="hover:underline">Ethnies</a>
        <a href="{{ route('civilisations') }}" class="hover:underline">Civilisations</a>
        <a href="#" class="hover:underline">À propos</a>
        <a href="#" class="hover:underline">Contact</a>

    </nav>

    <!-- 🖼️ Hero avec Parallaxe -->
    <section class="relative h-[50vh] overflow-hidden">
        <div class="absolute inset-0 bg-fixed bg-center bg-cover bg-no-repeat" style="background-image: url('https://cdn.midjourney.com/1b6d8960-28bb-4a9b-b796-3f4d74f27b13/0_1.png');"></div>
        <div class="absolute inset-0 bg-black/30 z-0"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
            <p class="italic text-3xl font-bold">Chaque pièce murmure un passé endormi</p>
        </div>
    </section>

    <!-- 🎠 Carrousel -->
    <section class="py-16 px-8" data-aos="fade-up">
        <div class="swiper-container h-[30vh]">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <img src="https://cdn.midjourney.com/ae925cb6-d28f-4c4e-a150-5176b43cbf3c/0_2.png" alt="Masque Maya" class="w-full h-full object-contain rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://cdn.midjourney.com/58ab26f2-a77f-4b16-b012-7382eacfdbce/0_1.png" alt="Masque Inca" class="w-full h-full object-contain rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://cdn.midjourney.com/989a41f8-81b9-4f58-bdf2-6ea1ef166e4e/0_3.png" alt="Tête Bénin" class="w-full h-full object-contain rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://cdn.midjourney.com/fa3ca222-56a3-4ab5-a249-aaa661ffbe7b/0_0.png" alt="Couronne Royale" class="w-full h-full object-contain rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="https://cdn.midjourney.com/e91eb5d4-6681-4116-b3fb-c6b775507df9/0_1.png" alt="Fragment Atlante" class="w-full h-full object-contain rounded-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 4 }
            }
        });
    </script>
</body>
</html>