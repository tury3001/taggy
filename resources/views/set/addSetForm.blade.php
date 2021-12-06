@extends('layout')

@section('content')
    <x-form.fieldset>
        <div>
            <h1 class="text-3xl mb-10">Add new set</h1>
        </div>
        <form action="/set/store" name="setForm" method="POST">
            @csrf
            <x-form.row>
                <x-form.input name="name" value=""></x-form.input>
            </x-form.row>
            <div class="flex justify-end">
                <x-form.button label="Save" class="bg-yellow-400" icon="far fa-save" class="bg-yellow-400 text-black"></x-form.button>
            </div>
        </form>
    </x-form.fieldset>
@endsection
