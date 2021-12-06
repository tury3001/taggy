@extends('layout')

@section('content')

    @if ($currentSet)
        <h1 class="text-3xl mb-10">Tags in set <span class="font-bold">{{ $currentSet->name }}</span></h1>

        @if ($tags->isNotEmpty())
            <div class="flex flex-row list-none flex-wrap">
            @foreach ($tags as $tag)
                <x-tag :tag="$tag" class="w-auto"></x-tag>
            @endforeach
            </div>
        @else
            <span>There are no tags yet.</span>
        @endif
    @else
        <span>There are no tags yet. Before uploading your media create a new set.</span>
    @endif
@endsection
