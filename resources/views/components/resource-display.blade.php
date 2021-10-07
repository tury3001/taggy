@props(['resource'])
@if ($resource->isImage())
    <img src="{{ asset('storage/' . $resource->path) }}" class="object-cover shadow">
@elseif ($resource->isVideo())
    <video controls>
        <source src="{{ asset('storage/' . $resource->path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@else
    Resource cannot be displayed.
@endif

