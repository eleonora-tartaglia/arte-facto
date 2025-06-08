<!-- @props([
    'id' => uniqid(),
    'color' => 'rgba(255, 255, 255, 0.03)', // douce transparence
    'bg' => 'transparent'
])

<svg {{ $attributes->merge(['class' => 'absolute inset-0 w-full h-full']) }} fill="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <pattern id="pattern-{{ $id }}" patternUnits="userSpaceOnUse" width="30" height="30">
            <rect width="30" height="30" fill="{{ $bg }}"></rect>
            <path d="M0 30L30 0M-15 15L15 -15M15 45L45 15" stroke="{{ $color }}" stroke-width="0.6"/>
        </pattern>
    </defs>
    <rect fill="url(#pattern-{{ $id }})" width="100%" height="100%"/>
</svg> -->



<!-- @props([
    'id' => uniqid(),
])

<svg {{ $attributes }} fill="none">
    <defs>
        <pattern id="pattern-{{ $id }}" x="0" y="0" width="8" height="8" patternUnits="userSpaceOnUse">
            <path d="M-1 5L5 -1M3 9L8.5 3.5" stroke-width="0.5"></path>
        </pattern>
    </defs>
    <rect stroke="none" fill="url(#pattern-{{ $id }})" width="100%" height="100%"></rect>
</svg> -->
