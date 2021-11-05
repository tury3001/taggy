@props(['name', 'options', 'currentOption'])
<x-form.label name="{{ $name }}"></x-form.label>
<select name="{{ $name }}"
        id="{{ $name }}"
        class="border mt-2 py-1 px-2">
    @foreach($options as $option)
        <option value="{{ $option->id }}"
        @if((int) $currentOption === $option->id)
            {{ "selected" }}
        @endif
        >
            {{ $option->name }}
        </option>
    @endforeach
</select>
