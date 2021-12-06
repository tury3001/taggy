@props(['resource'])
<ul class="flex mt-4 text-sm flex-wrap justify-center">
    @foreach ($resource->tags as $tag)
        <x-tag :tag="$tag"></x-tag>
    @endforeach
</ul>
