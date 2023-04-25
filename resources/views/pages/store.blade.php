<x-app-layout title="Store" selected="store">
    <div class="px-page py-11 space-y-8">
        <x-search-bar class="w-96 ml-auto"/>
        <div class="space-x-3">
            <x-category-item category="all"/>
            @foreach (\App\Utils\BookGenres::values() as $genre)
            <x-category-item category="{{$genre}}"/>
            @endforeach
        </div>
        <div class="w-full gap-[25px] grid grid-cols-4">
            @foreach ($products as $book)
            <x-item-card title="{{$book->title}}" src="{{$book->image}}" price="{{$book->price}}" author="{{$book->author}}" href="{{route('view', ['book' => $book->slug])}}"/>
            @endforeach
        </div>

        @includeWhen($paging, "components.page-control", ["paging" => $paging])
    </div>

</x-app-layout>
