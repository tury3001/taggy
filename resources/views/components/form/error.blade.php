@props(['name'])
@error($name)
    <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
@enderror

