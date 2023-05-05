<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$attributes->get("title", "Untitled Page")}} - Bookopolis</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <main class="flex flex-row items-stretch w-full h-screen">
        <div class="flex-1 h-full">
            <img src="{{asset('images/dummy_image.jpg')}}" class="w-full h-full object-cover" alt="">
        </div>
        <form {{$attributes}} class="flex flex-col w-[550px] max-md:w-[650px] gap-8 h-full px-16 max-sm:px-8 items-start justify-center bg-white">{{$slot ?? ""}}</form>
    </main>
    @livewireScripts
</body>
</html>
