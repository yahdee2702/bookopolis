<div class="flex flex-col gap-3 w-full p-6 bg-white rounded-3xl">
    <div class="flex flex-row gap-5">
        <img src="{{ $data->image ? $data->image : asset('images/1x1_picture.png') }}"
            class="aspect-1 w-44 h-44 rounded-full" alt="">
        <div class="flex flex-col gap-2 w-full">
            <div class="text-2xl font-semibold">{{ $data->title }}</div>
            <div class="grid grid-cols-2 gap-1 w-full">
                <x-mini-detail title="Author" value="{{ $data->author }}" />
                <x-mini-detail title="Price" value="{{ $data->price }}" />
                <x-mini-detail title="Total Stocks" value="{{ $data->stocks }}" />
                <x-mini-detail title="Genre" value="{{ $data->genre }}" />
                <x-mini-detail title="Stars" value="{{ $data->stars }}" />
                <x-mini-detail title="Seller" value="{{ $data->getSeller()->name }}" />
                <x-mini-detail title="Created At" value="{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}" />
                <x-mini-detail title="Last Updated" value="{{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}" />
            </div>
        </div>
    </div>
    <div class="px-6 py-2 bg-gray-less rounded-xl">
        <div class="text-sm font-medium text-black-less mb-1">Description</div>
        <div class="text-base">{{ $data->description ?? '' }}</div>
    </div>
</div>
