<section class="flex flex-row w-full max-md:flex-col-reverse bg-gray-lesser items-center">
    <div class="pl-page pr-5 h-full w-full space-y-6 max-md:px-8 max-md:py-10">
        <h2 class="font-bold text-[3.25rem] max-sm:text-4xl leading-tight">Try Out Other Products!</h2>
        <x-button href="/store" class="inline-block text-xl">
            Store
            @svg('svg/right-arrow.svg', 'stroke-white fill-white stroke-[0.1px] inline-block')
        </x-button>
    </div>
    <img src="{{asset("images/dummy_image.jpg")}}" class="w-full h-[450px] max-md:h-[350px] object-cover content-center filter brightness-50" alt="Commercial Picture">
</section>
