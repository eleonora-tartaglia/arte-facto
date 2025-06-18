<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>À propos – Arte Facto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0c0c0c] text-[#D8D3C3] font-sans leading-relaxed">

    @include('components.nav-top')
    @include('components.nav-categories')

    <section class="max-w-4xl mx-auto px-6 py-20">
        <h1 class="text-4xl font-serif text-[#A9842C] mb-6 text-center">À propos d’Arte Facto</h1>

        <p class="mb-6">
            Arte Facto est bien plus qu’une galerie virtuelle. C’est un sanctuaire numérique, une alcôve secrète où les reliques oubliées, les civilisations disparues et les mythes antiques s’entrelacent dans une danse éternelle.
        </p>

        <p class="mb-6">
            Née d’une passion dévorante pour l’archéologie, l’art ancien et les secrets du monde, cette galerie a pour vocation de redonner vie aux fragments du passé. Chaque artefact, chaque vestige, chaque récit a été soigneusement sélectionné pour éveiller l’imaginaire, nourrir la curiosité et honorer la mémoire des peuples oubliés.
        </p>

        <p class="mb-6">
            Derrière Arte Facto se cache une quête : <span class="italic">celle de rassembler ce qui fut dispersé</span>, de décoder les symboles d’un monde perdu, et de transmettre, à travers le prisme du numérique, la beauté brute des civilisations anciennes.
        </p>

        <p class="mb-6">
            Ici, tout est symbole. Le choix des couleurs, les typographies élégantes, les textures granuleuses... Chaque détail du design rend hommage aux matériaux du passé : le bronze patiné, le marbre fissuré, le parchemin oublié.
        </p>

        <p class="mb-6">
            Arte Facto est une invitation. Une immersion. Une promesse : celle de découvrir un monde où le passé murmure encore, pour qui sait l’écouter.
        </p>

    </section>

    @include('components.footer')

</body>
</html>
