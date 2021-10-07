@extends('layout')

@section('content')
<h1 class="text-3xl mb-10">Sets</h1>
<div class="flex justify-end">
    <a href="/set/create" class="w-1/6">
        <x-form.button icon="fas fa-plus-circle" label="Add new set" class="bg-yellow-400 w-full"></x-form.button>
    </a>
</div>
<table class="table w-full">
    <thead class="border-b">
        <tr>
            <th class="py-2 px-2 text-left">Id</th>
            <th class="py-2 px-2 text-left">Name</th>
            <th class="py-2 px-2 text-left">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sets as $set)
        <tr class="">
            <td class="py-2 px-2 text-left">{{ $set->id }}</td>
            <td class="py-2 px-2 text-left">{{ $set->name }}</td>
            <td>
                <a href="/set/edit/{{ $set->id }}" class="btn bg-yellow-400 px-4 py-1 inline-block rounded text-sm">
                    <i class="far fa-edit"></i> Rename
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
