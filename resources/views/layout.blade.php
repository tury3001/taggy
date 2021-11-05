<!doctype html>
<html lang="en">
<head>
    @include('_partials.head')
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
                Hello, {{ auth()->user()->name }}
                <div x-data="{}">
                    <form action="/logout" x-ref="logoutForm" method="POST">
                        @csrf
                        <button class="underline ml-2" x-on:click="$refs.logoutForm.submit()"> (Logout)</button>
                    </form>
                </div>
            </div>
        </navbar>
    </header>
    <main class="container mx-auto mt-12 min-h-screen">
        @yield('content')
    </main>
    <x-flash></x-flash>
    <footer class="bg-gray-900 text-white flex justify-center py-12 text-xs mt-20">
        Taggy
    </footer>
</body>
</html>
