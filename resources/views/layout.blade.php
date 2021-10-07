<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c686abe8b.js" crossorigin="anonymous"></script>
    <title>Taggy</title>
</head>
<body>
    <header>
        <navbar class="flex justify-between bg-gray-900 text-white p-4 align-middle flex-row">
            <div class="ml-4">
                <div class="flex justify-between">
                    <div class="flex">
                        <img src="/img/label-white.svg" alt="" width="32" height="32">
                        <h1 class="ml-4 font-bold text-2xl">
                            <a href="/">Taggy</a>
                        </h1>
                    </div>
                    <div class="ml-10">
                        <form action="/">
                            Search tags
                            <input type="text" name="search" id="search" class="ml-4 rounded-full text-black" autocomplete="off">
                            <button type="submit" name="submitSearch" id="submitSearch" class="px-4 py-1 bg-yellow-400 rounded-full ml-4 text-black text-sm uppercase font-bold">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </form>
                    </div>
                    <div class="ml-10">
                        <a href="/tags">Explore tags</a>
                    </div>
                    <div class="ml-10">
                        <a href="/sets">Manage sets</a>
                    </div>
                </div>
            </div>
            <div class="mr-4 flex align-middle">
                <a href="/resources/create">
                    <button class="bg-yellow-400 rounded-full text-black px-4 py-1 mr-4 text-sm uppercase font-bold"><i class="fas fa-plus-circle"></i> Add</button>
                </a>
                <form action="/changeSet" method="GET">
                    @csrf
                    <select name="set" id="set" class="text-black rounded-full px-3">
                        @foreach ($sets as $set)
                            <option
                                @if ($set->id == $currentSetId)
                                    {{ 'selected' }}
                                @endif
                            value="{{ $set->id }}">{{ $set->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-yellow-400 rounded-full text-black px-4 py-1 mr-4 text-sm uppercase font-bold"><i class="fas fa-chevron-right"></i> Select</button>
                </form>
            </div>
        </navbar>
    </header>
    <main class="container mx-auto mt-12 min-h-screen">
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-white flex justify-center py-12 text-xs mt-20">
        Taggy
    </footer>
</body>
</html>
