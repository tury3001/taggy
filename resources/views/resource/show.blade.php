@extends('layout')

@section('content')
    <div class="flex flex-col items-center w-full">
        <x-section-header :title="'Resource ' . $resource->id" ></x-section-header>
        <main class="flex justify-center w-full">
            <x-resource-display :resource="$resource"></x-resource-display>
        </main>
        <div class="mt-4">
            <x-resource-tags :resource="$resource"></x-resource-tags>
        </div>
        <div class="mt-5">
            <span class="text-sm">Uploaded at {{ $resource->created_at->format('y/m/Y H:i') }}</span>
        </div>
        <div class="flex justify-center w-full mt-10">
            <a href="/resources/{{ $resource->id }}/edit" class="w-1/4 flex justify-center">
                <x-form.button label="Editar" icon="far fa-edit" class="bg-yellow-400 text-black">Edit</x-form.button>
            </a>
        </div>
    </div>
@endsection
