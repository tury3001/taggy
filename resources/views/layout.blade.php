<!doctype html>
<html lang="en">
<head>
    @include('_partials.head')
</head>
<body>
    <header>
        @include('_partials.navbar')
        @include('_partials.search-bar')
    </header>
    <main class="md:container mx-auto mt-12 min-h-screen px-2">
        @yield('content')
    </main>
    <x-flash></x-flash>
    <footer class="bg-gray-900 text-white flex justify-center py-12 text-xs mt-20">
        Taggy
    </footer>
</body>
</html>
