<x-app-layout selected="store" title="{{$book->title}} by {{$book->author}}">
    <div class="flex flex-col gap-6 px-page max-md:px-8 py-11">
        <div class="w-full flex flex-row gap-5 max-md:flex-col">
            <img src="{{ $book->image }}" class="w-full min-w-0 max-w-[400px] p-0 aspect-w-1 aspect-h-1 object-cover rounded-lg object-center"
                alt="{{ $book->title }} image">
            <form action="{{ route('user.buy', ['book' => $book->slug]) }}" method="POST" class="space-y-2">
                @csrf
                <div>
                    <h2 class="text-5xl max-md:text-3xl font-bold">{{ $book->title }}</h2>
                    <div class="text-2xl max-md:text-xl">{{ $book->author }}</div>
                </div>

                <x-stars class="w-7 h-7 fill-black" value="{{ $book->stars }}" max-value="5" />

                <div class="py-2">
                    <div class="text-black-less text-xl max-md:text-base">{{ $book->stocks }} stocks available | {{ $book->sold }} sold</div>
                    <div class="flex items-center gap-2">
                        <div class="text-xl max-md:text-base">Quantity: </div>

                        <input class="text-lg text-center w-14 h-14 bg-white rounded-lg border border-gray outline-0"
                            type="number" min="0" max="{{ $book->stocks }}"
                            value="{{ $book->stocks >= 1 ? 1 : 0 }}" name="quantity" />
                    </div>
                </div>

                <x-button type="submit" class="text-lg">Buy Now</x-button>
            </form>
        </div>

        <div class="space-y-2">
            <h4 class="text-2xl max-md:text-lg">Description</h4>
            <p class="text-lg max-md:text-base text-black-less">{{ $book->description }}</p>
        </div>

        <x-recommended-section title="Our Suggestions">
            @foreach ($recommended as $book)
            <x-item-card title="{{$book->title}}" src="{{$book->image}}" price="{{$book->price}}" author="{{$book->author}}" href="{{route('view', ['book' => $book->slug])}}"/>
            @endforeach
        </x-recommended-section>
    </div>
</x-app-layout>
