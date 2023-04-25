<section class="flex flex-row w-full bg-gray-lesser items-center">
    <div class="pl-page pr-5 h-full w-full space-y-6">
        <h2 class="font-bold text-[52px] leading-tight">Try Out Other Products!</h2>
        <x-button href="/store" class="inline-block text-xl">
            Store
            @svg('svg/right-arrow.svg', 'stroke-white fill-white stroke-[0.1px] inline-block')
        </x-button>
    </div>
    <img src="{{asset("images/dummy_image.jpg")}}" class="w-full h-[450px] object-cover content-center filter brightness-50" alt="Commercial Picture">
</section>
