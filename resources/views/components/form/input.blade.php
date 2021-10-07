@props(['name', 'type' => 'input', 'placeholder', 'tip' => ''])
<x-form.label name="{{ $name }}"></x-form.label>
@if($tip)
    <small>{{ $tip }}</small>
@endif
<input type="{{ $type }}"
       name="{{ $name }}"
       id="{{ $name }}"
       class="border mt-2 py-1 px-2"
       autocomplete="off"
       placeholder="{{ $placeholder ?? '' }}"
       {{ $attributes }}
>
<x-form.error name="{{ $name }}"></x-form.error>
