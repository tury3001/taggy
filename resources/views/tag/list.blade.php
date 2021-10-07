@extends('layout')

@section('content')
<h1 class="text-3xl mb-10">Tags in set <span class="font-bold">{{ $currentSet->name }}</span></h1>
    <div class="flex flex-row list-none flex-wrap">
    @foreach ($tags as $tag)
        <x-tag :tag="$tag" class="w-auto"></x-tag>
    @endforeach
    </div>
@endsection
