@extends('layout')

@section('content')
    <x-form.fieldset>
        <h1 class="text-3xl mb-10">Edit set</h1>
        <form action="/set/update" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $set->id }}">
            <x-form.row>
                <x-form.input name="name" value="{{ $set->name }}"></x-form.input>
            </x-form.row>
            <div class="flex justify-end">
                <x-form.button label="save" icon="far fa-save" class="bg-yellow-400 text-black"></x-form.button>
            </div>
        </form>
    </x-form.fieldset>
@endsection
