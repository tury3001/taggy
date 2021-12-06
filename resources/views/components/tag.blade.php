@props(['tag'])
<a href="/?search={{ $tag->name }}">
    <li class="px-4 bg-gray-300 rounded-full mr-1 mb-2">{{ $tag->name }}</li>
</a>
