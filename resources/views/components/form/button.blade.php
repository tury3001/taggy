@props(['label', 'icon'])
<button {{  $attributes->merge(["class" => "text-sm text-black py-2 px-8 rounded-full uppercase font-bold"]) }}><i class="{{ $icon }} mr-2 inline-block align-middle"></i><span class="inline-block align-middle">{{ $label }}</span></button>


