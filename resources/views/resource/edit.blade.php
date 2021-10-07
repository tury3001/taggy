@extends('layout')

@section('content')
    <x-form.fieldset>
        <x-section-header title="Edit resource"></x-section-header>
        <div>
            <x-resource-display :resource="$resource"></x-resource-display>
        </div>
        <main class="mt-20">
            <form action="/resources/{{ $resource->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $resource->id }}">
                <x-form.row>
                    <x-form.select name="set"
                                   :options="$sets"
                                   :currentOption="$resource->set->id"
                    >
                    </x-form.select>
                </x-form.row>
                <x-form.row>
                    <x-form.input name="file"
                                  type="file"
                                  tip=""
                                  value=""
                    >
                    </x-form.input>
                </x-form.row>
                <x-form.row>
                    <x-form.input name="tags"
                                  type="input"
                                  placeholder="meme fun internet"
                                  tip="Space separated"
                                  :value="old('tags', $resource->getTagsString())"
                    >
                    </x-form.input>
                </x-form.row>
                <div class="flex justify-between">
                    <x-form.button label="Delete" icon="fas fa-trash-alt" class="bg-red-600 text-white"></x-form.button>
                    <x-form.button label="Save" icon="far fa-save" class="bg-yellow-400 text-black"></x-form.button>
                </div>
            </form>
            <x-message.success></x-message.success>
        </main>
    </x-form.fieldset>
@endsection
