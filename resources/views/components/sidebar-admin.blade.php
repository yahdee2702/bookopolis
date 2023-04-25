<aside class="flex flex-col items-center justify-between w-fit h-full px-6 py-12 bg-black rounded-r-3xl">
    @php($selected = $attributes->get('selected'))
    <x-nav-item-admin href="{{route('admin.home')}}" selected="{{$selected == -1}}">@svg('svg\home.svg', 'w-7 h-7')</x-admin-nav-item>

    <div class="flex flex-col gap-6">
        <x-nav-item-admin href="{{route('admin.admins')}}" selected="{{$selected == 0}}">@svg('svg\person-star.svg', 'w-7 h-7')</x-admin-nav-item>
        <x-nav-item-admin href="{{route('admin.users')}}" selected="{{$selected == 1}}">@svg('svg\people.svg', 'w-7 h-7')</x-admin-nav-item>
        <x-nav-item-admin href="{{route('admin.books')}}" selected="{{$selected == 2}}">@svg('svg\book.svg', 'w-7 h-7')</x-admin-nav-item>
    </div>
    <form action="{{route('admin.logout')}}" method="POST">
        @csrf
        <button type="submit" class="px-2 py-2 rounded-lg fill-white bg-red">@svg('svg\arrow-exit.svg', 'w-7 h-7')</button>
    </form>
</aside>
