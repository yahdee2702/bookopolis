<a {{$attributes->only('href')}} class="flex flex-col rounded-lg bg-white hover:bg-black hover:text-white hover:border-black border border-gray overflow-clip">
    <img {{$attributes->only('src')}} class="w-[285px] h-[285px] object-cover object-center" alt="Item Photo's">

    <div class="px-5 py-2">
        <div class="flex flex-row justify-between items-start">
            <span class="text-xl font-semibold max-w-[140px]">{{$attributes->get("title", "Null")}}</span>
            <span class="text-[1.625rem] font-bold text-green">${{number_format((int)filter_var($attributes->get("price", 0), FILTER_SANITIZE_NUMBER_INT), 2)}}</span>
        </div>
        <div class="text-base mt-3">{{$attributes->get('author', "Null")}}</div>
    </div>
</a>
