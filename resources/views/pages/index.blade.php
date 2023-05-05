<x-app-layout selected="home" title="Home">
    <x-slot name="header">
        <x-jumbotron/>
    </x-slot>

    <x-slot name="main">
        <div class="px-page max-md:px-8">
            <x-recommended-section title="Best Seller">
                @foreach ($bestSeller as $book)
                <x-item-card title="{{$book->title}}" src="{{$book->image}}" price="{{$book->price}}" author="{{$book->author}}" href="{{route('view', ['book' => $book->slug])}}"/>
                @endforeach
            </x-recommended-section>
            <x-recommended-section title="New Release">
                @foreach ($newRelease as $book)
                <x-item-card title="{{$book->title}}" src="{{$book->image}}" price="{{$book->price}}" author="{{$book->author}}" href="{{route('view', ['book' => $book->slug])}}"/>
                @endforeach
            </x-recommended-section>
        </div>
        <x-commercial-section/>
    </x-slot>
</x-app-layout>
