<x-app-layout selected="store">
    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="flex flex-col gap-6 px-page py-11">
        <div class="flex flex-row gap-5">
            <img src="{{ $book->image }}" class="w-[400px] h-[400px] object-cover rounded-lg object-center"
                alt="{{ $book->title }} image">
            <form action="{{ route('user.buy', ['book' => $book->slug]) }}" method="POST" class="space-y-2">
                @csrf
                <div>
                    <h2 class="text-5xl font-bold">{{ $book->title }}</h2>
                    <div class="text-2xl">{{ $book->author }}</div>
                </div>

                <x-stars class="w-7 h-7 fill-black" value="{{ $book->stars }}" max-value="5" />

                <div class="py-2">
                    <div class="text-black-less text-xl">{{ $book->stocks }} stocks available | {{ $book->sold }} sold</div>
                    <div class="flex items-center gap-2">
                        <div class="text-xl">Quantity: </div>

                        <input class="text-lg text-center w-14 h-14 bg-white rounded-lg border border-gray outline-0"
                            type="number" min="0" max="{{ $book->stocks }}"
                            value="{{ $book->stocks >= 1 ? 1 : 0 }}" name="quantity" />
                    </div>
                </div>

                <x-button type="submit" class="text-lg">Buy Now</x-button>
            </form>
        </div>

        <div class="space-y-2">
            <h4 class="text-2xl">Description</h4>
            <p class="text-lg text-black-less">{{ $book->description }}</p>
        </div>

        <x-recommended-section title="Our Suggestions">

        </x-recommended-section>
    </div>
</x-app-layout>
