<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Untitled Page' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <main class="relative w-full h-screen">
        <div class="h-full">
            <img src="{{ asset('images/dummy_image.jpg') }}" class="w-full h-full object-cover" alt="">
        </div>
        <form action="{{route('admin.login')}}" method="POST" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-[500px] h-[500px] w-11/12 flex flex-col gap-8 px-16 max-sm:px-8 items-start justify-center bg-white rounded-lg">
            @csrf
            <h1 class="text-5xl font-bold">Admin Login</h1>
            <div class="flex flex-col gap-5 self-stretch">
                <x-form-input id="usernameInp" type="text" name="username" placeholder="Input your username">
                    @svg('svg\person.svg')
                </x-form-input>
                <x-form-input id="passwordInp" type="password" name="password" placeholder="Input your password">
                    @svg('svg\password.svg')
                </x-form-input>
            </div>

            <x-button type="submit" class="self-stretch text-lg">Sign In</x-button>
        </form>
    </main>
    @livewireScripts
</body>

</html>
