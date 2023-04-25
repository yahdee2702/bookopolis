<div class="flex flex-col gap-3 w-full p-6 bg-white rounded-3xl">
    <div class="flex flex-row gap-5">
        <img src="{{ $data->image }}" class="aspect-1 w-44 h-44 rounded-full" alt="">
        <div class="flex flex-col gap-2 w-full">
            <div class="text-2xl font-semibold">{{ $data->username }}</div>
            <div class="grid grid-cols-2 gap-1 w-full">
                <x-mini-detail title="Email" value="{{ $data->email }}" />
                <x-mini-detail title="Last Online"
                    value="{{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}" />
                <x-mini-detail title="Created At"
                    value="{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}" />
                <x-mini-detail title="Last Updated"
                    value="{{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}" />
            </div>
        </div>
    </div>
    {{-- @if ($data->lastActivity())
        <div class="px-6 py-2 bg-gray-less rounded-xl font-medium">
            <div class="text-sm text-black-less">Last Activity</div>
            <div class="text-lg">{{ $data->lastActivity()->description ?? '' }}</div>
        </div>
    @endif --}}
</div>
