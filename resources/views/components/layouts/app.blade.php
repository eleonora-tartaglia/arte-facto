<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{-- ✅ on gère à la fois les slots nommés et anonymes --}}
        {{ $content ?? $slot }}
    </flux:main>
</x-layouts.app.sidebar>
