@extends('layout')

@section('content')
<h1 class="text-3xl mb-10">Sets</h1>
<div class="flex justify-end">
    <a href="/set/create">
        <x-form.button icon="fas fa-plus-circle" label="Add new set" class="bg-yellow-400 w-full"></x-form.button>
    </a>
</div>
@if ($sets->isNotEmpty())
    <table class="table w-full mt-20">
        <thead class="border-b">
            <tr>
                <th class="py-2 px-2 text-left">Id</th>
                <th class="py-2 px-2 text-left">Name</th>
                <th class="py-2 px-2 text-right">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sets as $set)
            <tr>
                <td class="py-2 px-2 text-left">{{ $set->id }}</td>
                <td class="py-2 px-2 text-left">{{ $set->name }}</td>
                <td class="text-right">
                    <a href="/set/edit/{{ $set->id }}" class="btn bg-yellow-400 px-4 py-1 inline-block rounded text-sm">
                        <i class="far fa-edit"></i> Rename
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <span>You haven't created any set.</span>
@endif
@endsection
