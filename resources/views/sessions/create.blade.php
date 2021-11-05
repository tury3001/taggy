<!doctype html>
<html lang="en">
<head>
    @include('_partials.head')
</head>
<body>
    <div class="flex h-screen">
        <main class="mt-40 flex m-auto flex-col w-1/5 shadow p-8 rounded">
            <h1 class="text-2xl mb-10 flex-1">Log In</h1>
            <form action="/login" method="POST" class="flex flex-col space-y-3">
                @csrf
                <x-form.input name="email"
                              placeholder="example@email.com"
                              tip=""
                              value=""
                ></x-form.input>
                <x-form.input name="password"
                              type="password"
                              placeholder=""
                              tip=""
                              value=""
                ></x-form.input>
                <div class="flex justify-end">
                    <x-form.button icon="fas fa-sign-in-alt"
                                   label="Log In"
                                   class="bg-yellow-400 text-black mt-10">
                    </x-form.button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
