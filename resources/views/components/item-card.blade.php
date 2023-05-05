<a {{$attributes->only('href')}} class="flex flex-col shrink-0 rounded-lg bg-white hover:bg-black hover:text-white hover:border-black border border-gray overflow-clip">
    <img {{$attributes->only('src')}} class="w-[285px] max-sm:w-full max-md:w-[250px] aspect-1 object-cover object-center" alt="Item Photo's">

    <div class="px-5 max-md:px-3 py-2">
        <div class="flex flex-row justify-between items-start">
            <span class="text-xl max-sm:text-lg font-semibold max-w-[140px]">{{$attributes->get("title", "Null")}}</span>
            <span class="text-[1.4rem] max-sm:text-[1.3rem] font-bold text-green">${{number_format((int)filter_var($attributes->get("price", 0), FILTER_SANITIZE_NUMBER_INT), 2)}}</span>
        </div>
        <div class="text-base max-sm:text-sm">{{$attributes->get('author', "Null")}}</div>
    </div>
</a>
