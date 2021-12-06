@extends('layout')

@section('content')
<div class="text-sm px-4">
    {{ $pagination->count() }}

    @if ($pagination->count() > 1)
         results found.
    @else
         result found.
    @endif
</div>
<div class="flex flex-col justify-center mt-5">
<!-- <div class="flex flex-wrap justify-start"> -->
    <div class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-4">
        @foreach ($pagination->items() as $resource)
        <div class="flex flex-col mb-10">
            <div>
                <a href="/resources/{{ $resource->id }}">
                    @if (file_exists(public_path('storage/' . $resource->path)))
                        @if ($resource->isImage())
                            <img src="{{ asset('storage/' . $resource->path) }}" class="object-cover h-60 md:w-full shadow mx-auto">
                        @else
                            <div class="md:h-60 overflow-hidden object-center">
                                <video muted class="object-fill">
                                    <source src="{{ asset('storage/' . $resource->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                    @else
                        <img src="https://fakeimg.pl/320x220/?text={{ $resource->id }}" class="object-cover h-60 md:w-full shadow mx-auto">
                    @endif
                </a>
            </div>
            <div class="px-4">
                <x-resource-tags :resource="$resource"></x-resource-tags>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="mt-10">
    <?php echo $pagination->links() ?>
</div>
@endsection
