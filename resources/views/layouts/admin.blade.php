@php
    $title = $attributes->get("title") ?? $title;
    $navTitle = $attributes->get("navTitle") ?? $navTitle;
    $selected = $attributes->get("selected") ?? $selected;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Untitled Page"}} - Bookopolis</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="flex flex-row w-full h-screen">
        <x-sidebar-admin selected="{{$selected}}"/>
        <main class="w-full flex flex-col flex-1 p-2 gap-3">
            <nav class="flex flex-row flex-none items-center justify-between rounded-3xl w-full px-6 py-4 bg-gray-less">
                <div class="text-lg font-medium">
                    {{$navTitle ?? "Untitled"}}
                </div>
            </nav>
            <x-admin-container>
                {{$main ?? $slot ?? ""}}
            </x-admin-container>
        </main>
    </div>
    @livewireScripts
</body>
</html>
