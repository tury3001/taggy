@props(['active' => false, 'href' => '#'])

@php
$classes = 'px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-yellow-400 focus:outline-none focus:shadow-outline';

if ($active) {
    $classes .= ' bg-yellow-400 text-black hover:bg-yellow-400' ;
}
@endphp

<a {{ $attributes(['class' => $classes]) }} href="{{ $href }}">{{ $slot }}</a>
