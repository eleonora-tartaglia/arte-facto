<header class="flex justify-between items-center p-6">
    <h1 class="text-3xl font-bold" style="font-family: 'Marcellus', serif;">ARTE FACTO</h1>
    <div class="space-x-4">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded border border-[rgb(67,54,17)] px-6 py-2 hover:bg-[rgb(67,54,17)] transition duration-300">
                    Déconnexion
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="rounded border border-[rgb(67,54,17)] px-6 py-2 hover:bg-[rgb(67,54,17)] transition duration-300">Connexion</a>
            <a href="{{ route('register') }}" class="rounded border border-[rgb(67,54,17)] px-6 py-2 hover:bg-[rgb(67,54,17)] transition duration-300">Inscription</a>
        @endauth
    </div>
</header>
