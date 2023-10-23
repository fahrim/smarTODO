@props(['color' => 'gray'])

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset'])
                    ->class([
                        'bg-'.$color.'-50 text-'.$color.'-700 ring-'.$color.'-700/10',
                        'dark:bg-'.$color.'-400/10 dark:text-'.$color.'-400 dark:ring-'.$color.'-400/30'
                    ]) }}>
    {{ $slot }}
</span>

@php

/**
// Available colors
$colors = [
    'gray',
    'red',
    'orange',
    'yellow',
    'green',
    'blue',
    'indigo',
    'purple',
    'pink',
];
*/

/** Switch-case for tailwind-css color building  */
@endphp

@switch($color)
    @case('gray')
        @if(false)
            <span class="bg-gray-50 text-gray-700 ring-gray-700/10 dark:bg-gray-400/10 dark:text-gray-400 dark:ring-gray-400/30">Gray Build</span>
        @endif
        @break
    @case('red')
        @if(false)
            <span class="bg-red-50 text-red-700 ring-red-700/10 dark:bg-red-400/10 dark:text-red-400 dark:ring-red-400/30">Red Build</span>
        @endif
        @break
    @case('orange')
        @if(false)
            <span class="bg-orange-50 text-orange-700 ring-orange-700/10 dark:bg-orange-400/10 dark:text-orange-400 dark:ring-orange-400/30">Orange Build</span>
        @endif
        @break
    @case('yellow')
        @if(false)
            <span class="bg-yellow-50 text-yellow-700 ring-yellow-700/10 dark:bg-yellow-400/10 dark:text-yellow-400 dark:ring-yellow-400/30">Yellow Build</span>
        @endif
        @break
    @case('green')
        @if(false)
            <span class="bg-green-50 text-green-700 ring-green-700/10 dark:bg-green-400/10 dark:text-green-400 dark:ring-green-400/30">Green Build</span>
        @endif
        @break
    @case('blue')
        @if(false)
            <span class="bg-blue-50 text-blue-700 ring-blue-700/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/30">Blue Build</span>
        @endif
        @break
    @case('indigo')
        @if(false)
            <span class="bg-indigo-50 text-indigo-700 ring-indigo-700/10 dark:bg-indigo-400/10 dark:text-indigo-400 dark:ring-indigo-400/30">Indigo Build</span>
        @endif
        @break
    @case('purple')
        @if(false)
            <span class="bg-purple-50 text-purple-700 ring-purple-700/10 dark:bg-purple-400/10 dark:text-purple-400 dark:ring-purple-400/30">Purple Build</span>
        @endif
        @break
    @case('pink')
        @if(false)
            <span class="bg-pink-50 text-pink-700 ring-pink-700/10 dark:bg-pink-400/10 dark:text-pink-400 dark:ring-pink-400/30">Pink Build</span>
        @endif
        @break
    @default
        @break
@endswitch
