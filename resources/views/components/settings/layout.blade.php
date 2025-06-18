<div class="p-8 text-[#D8D3C3] bg-[#0c0c0c] min-h-screen font-serif">
    <div class="flex items-start max-md:flex-col">
        
        {{-- 🧭 Barre de navigation à gauche --}}
        <div class="me-10 w-full pb-4 md:w-[220px]">
            <flux:navlist>
                <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Profil') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Mot de passe') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Ambiance') }}</flux:navlist.item>
            </flux:navlist>
        </div>

        <flux:separator class="md:hidden" />

        {{-- ⚙️ Contenu principal --}}
        <div class="flex-1 self-stretch max-md:pt-6">
            <flux:heading class="text-[#D8D3C3]">{{ $heading ?? '' }}</flux:heading>
            <flux:subheading class="text-gray-400">{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full max-w-lg bg-[#1a1a1a] p-6 rounded-xl shadow-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
