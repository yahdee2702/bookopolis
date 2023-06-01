@php
    $selected = $attributes->get('selected', 'home');
@endphp

<nav
    class="flex flex-row justify-between items-center w-full sticky top-0 bg-gray-less border-b-[1.5px] border-b-black px-page max-md:px-8 py-4 z-50">
    <x-app-icon />

    <div class="flex flex-row items-center gap-5 max-lg:hidden">
        <x-nav-item href="{{ route('home') }}" selected="{{ $selected == 'home' }}">Home</x-nav-item>
        <x-nav-item href="{{ route('store') }}" selected="{{ $selected == 'store' }}">Store</x-nav-item>
    </div>

    @guest('user')
        <div class="flex flex-row gap-2 max-lg:hidden">
            <x-button href="{{ route('user.register') }}">Register</x-button>
            <x-button href="{{ route('user.login') }}">Login</x-button>
        </div>
    @endguest

    @auth('user')
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <x-button type="submit" class="bg-red max-lg:hidden">Logout</x-button>
        </form>
    @endauth

    <div x-data="{ open: false }" class="lg:hidden">
        <div class="w-7 h-7" x-on:click="open = !open">
            @svg('svg/add.svg', 'w-full h-full')
        </div>

        <div x-show="open"
            class="absolute top-full left-0 flex flex-col w-full pb-4 rounded-b-3xl bg-gray-less border-b border-b-black">
            <x-nav-menu-item href="{{ route('home') }}" selected="{{ $selected == 'home' }}">Home</x-nav-menu-item>
            <x-nav-menu-item href="{{ route('store') }}" selected="{{ $selected == 'store' }}">Store</x-nav-menu-item>

            <div class="px-page max-md:px-8 self-end">
                @guest('user')
                    <div class="flex flex-row gap-2 mt-2">
                        <x-button href="{{ route('user.register') }}">Register</x-button>
                        <x-button href="{{ route('user.login') }}">Login</x-button>
                    </div>
                @endguest

                @auth('user')
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <x-button type="submit" class="bg-red mt-2">Logout</x-button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
