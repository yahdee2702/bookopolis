<section {{$attributes->except('title')->merge(['class' => 'flex flex-col gap-5 h-full w-full p-6 bg-grayv2 rounded-2xl'])}}>
    <div class="flex flex-row gap-5">
        <h3 class="text-2.5xl font-semibold">{{$attributes->get("title", "Undefined")}}</h3>
        {{$titleAddon ?? ""}}
    </div>
    <div class="flex flex-col overflow-y-auto gap-3 thin-scroll h-full pr-1">
        {{$main ?? $slot ?? ""}}
    </div>
    {{$bottomAddon ?? ""}}
</section>
