@extends('layout')

@section('content')
    <x-form.fieldset>
        <x-section-header title="Add new resource"></x-section-header>
        <form action="/resources" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.row>
                <x-form.select name="set"
                               :options="$sets"
                               :currentOption="$currentSetId"
                >
                </x-form.select>
            </x-form.row>
            <x-form.row>
                <x-form.input name="file"
                              type="file"
                              value=""
                              tip="Images or videos"
                >
                </x-form.input>
            </x-form.row>
            <x-form.row>
                <x-form.input name="tags"
                              placeholder="meme fun internet"
                              tip="Space separated"
                              value=""
                >
                </x-form.input>
            </x-form.row>
            <x-form.button label="Save" icon="far fa-save" class="bg-yellow-400 text-black"></x-form.button>
        </form>
    </x-form.fieldset>
@endsection
