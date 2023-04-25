@php($title = $attributes->get('title', 'Untitled Page'))

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <x-navbar {{$attributes->only('selected')}}/>
    <header>
        {{$header ?? ""}}
    </header>
    <main>{{$main ?? $slot ?? ""}}</main>
    <x-footer/>
    @livewireScripts
</body>
</html>
