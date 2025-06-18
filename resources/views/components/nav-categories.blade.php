<nav class="bg-[#1A1A1A] py-4 px-6 flex space-x-6 justify-center text-sm uppercase tracking-widest">
    <a href="{{ route('home') }}" class="hover:underline">Accueil</a>
    <a href="{{ route('clochette_test') }}" class="hover:underline">Reliques</a>
    <!-- <a href="#" class="hover:underline">Civilisations</a> -->
    <a href="{{ route('civilisations.menu') }}" class="hover:underline">Civilisations</a>
    <a href="{{ route('civilisations.index') }}" class="hover:underline">Galerie</a>
    <a href="{{ route('about') }}" class="hover:underline">À propos</a>
    <a href="#" class="hover:underline">Contact</a>
</nav>

<!-- Le composant x-menu-category reçoit dynamiquement les catégories. -->