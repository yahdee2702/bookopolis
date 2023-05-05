<section class="py-11 w-full">
    <div class="flex flex-row w-full mb-8 justify-between items-center">
        <h3 class="text-4xl max-sm:text-2.5xl font-bold">{{$attributes->get("title", "Items")}}</h3>
        <x-button href="/store">
            Show More
            @svg('svg\right-arrow.svg', "inline-block fill-white")
        </x-button>
    </div>

    <div class="w-full flex flex-row overflow-x-auto gap-28 list-scroll">
        {{$slot}}
    </div>
</section>
