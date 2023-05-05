<x-app-layout selected="store" title="Store">
    <div class="px-page max-md:px-8 py-11 space-y-8">
        <x-search-bar class="w-96 ml-auto"/>
        <div class="flex flex-row gap-3 overflow-x-auto">
            <x-category-item category="all"/>
            @foreach (\App\Utils\BookGenres::values() as $genre)
            <x-category-item category="{{$genre}}"/>
            @endforeach
        </div>
        <div class="w-full gap-6 flex flex-col items-center xs:grid xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-2 min-[840px]:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $book)
            <x-item-card title="{{$book->title}}" src="{{$book->image}}" price="{{$book->price}}" author="{{$book->author}}" href="{{route('view', ['book' => $book->slug])}}"/>
            @endforeach
        </div>

        @includeWhen($paging, "components.page-control", ["paging" => $paging])
    </div>
</x-app-layout>
