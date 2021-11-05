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
                <div class="flex">
                    <x-form.button label="Save"
                                   icon="far fa-save"
                                   class="bg-yellow-400 text-black"
                    >
                    </x-form.button>
                </div>
            </form>
            <h2 class="mt-20 mb-5 text-xl">Delete resource</h2>
            <p>Associated file will be deleted from filesystem and the record will be erased from the database.</p>

            <div class="mt-10">
                <form action="/resources/{{ $resource->id }}" method="POST" name="deleteResource">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white text-sm text-black w-1/4 py-2 rounded-full uppercase font-bold">
                        <i class="fas fa-trash-alt mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </main>
    </x-form.fieldset>
@endsection
