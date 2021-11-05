@props(['label', 'icon'])
<button {{  $attributes->merge(["class" => "text-sm text-black md:w-1/4 py-2 rounded-full uppercase font-bold"]) }}><i class="{{ $icon }} mr-2"></i>{{ $label }}</button>


