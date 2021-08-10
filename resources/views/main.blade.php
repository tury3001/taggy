<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Taggy</title>
</head>
<body>
    <header>
        <navbar class="flex justify-between bg-gray-900 text-white p-4">
            <div class="ml-4">
                <div class="flex">
                    <div class="flex">
                        <img src="/img/label-white.svg" alt="" width="32" height="32">
                        <h1 class="ml-4 font-bold text-2xl">
                            <a href="/">Taggy</a>
                        </h1>
                    </div>
                    <div class="ml-10">
                        <form>
                            Search tags
                            <input type="text" name="search" id="search" class="ml-4 rounded-full text-black" autocomplete="off">
                            <button type="submit" name="submitSearch" id="submitSearch" class="px-4 py-1 bg-yellow-400 rounded-full ml-4 text-black text-sm">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mr-4">
                <form action="/changeSet" method="GET">
                    @csrf
                    <select name="set" id="set" class="text-black rounded-full px-2">
                        @foreach ($sets as $set)
                            <option
                                @if ($set->id == $currentSet)
                                    {{ 'selected' }}
                                @endif
                            value="{{ $set->id }}">{{ $set->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="text-black px-4 py-1 bg-yellow-400 rounded-full ml-4">Select ></button>
                </form>
            </div>
        </navbar>
    </header>
    <main class="container mx-auto mt-12">
        <div class="flex flex-wrap justify-between">
            @foreach ($pagination->items() as $resource)
            <div class="box bg-gray-400 mt-10 mb-10">
                <img src="https://fakeimg.pl/320x220/?text={{ $resource->id }}">
                <ul class="flex mt-4 text-sm flex-wrap">
                @foreach ($resource->tags as $tag)
                     <li class="px-4 bg-yellow-400 rounded-full mr-1 mb-2">{{ $tag->name }}</li>
                @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
            <?php echo $pagination->links() ?>
        </div>
    </main>
    <footer class="bg-gray-900 text-white flex justify-center py-12 text-xs mt-20">
        Taggy
    </footer>
</body>
</html>
