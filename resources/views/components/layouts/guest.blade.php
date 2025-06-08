<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Arte Facto' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0c0c0c] text-[#D8D3C3] font-sans">

    @include('components.nav-top')
    @include('components.nav-categories')

    {{-- On vérifie si un slot nommé 'content' existe --}}
    {{ $content ?? '' }}

</body>
</html>
