@php
    $selected = $attributes->get('selected', 'home')
@endphp

<nav class="flex flex-row justify-between items-center w-full sticky top-0 bg-gray-less border-b-[1.5px] border-b-black px-page py-4 z-50">
    <x-app-icon/>

    <div class="flex flex-row items-center gap-5">
        <x-nav-item href="/" selected="{{$selected == 'home'}}">Home</x-nav-item>
        <x-nav-item href="/store" selected="{{$selected == 'store'}}">Store</x-nav-item>
    </div>

    @guest('user')
    <div class="flex flex-row gap-2">
        <x-button href="{{route('user.register')}}">Register</x-button>
        <x-button href="{{route('user.login')}}">Login</x-button>
    </div>
    @endguest

    @auth('user')
    <form action="{{route('user.logout')}}" method="POST">
        @csrf
        <x-button type="submit" class="bg-red">Logout</x-button>
    </form>
    @endauth
</nav>
