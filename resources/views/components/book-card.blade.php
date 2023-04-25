<div @class([
    'flex flex-row items-center w-full rounded-xl cursor-pointer',
    'bg-white' => !$selected,
    'bg-black text-white' => $selected,
]) wire:click="{{ !$selected ? $func . '(' . $data->id . ')' : $func . '(-1)' }}">
    <img src="{{ $data->image }}" class="aspect-1 w-36 h-36 rounded-l-xl objcet-cover" alt="">
    <div class="w-full h-full flex flex-col justify-between flex-1 px-4 py-3">
        <div>
            <h5 class="text-xl font-semibold mb-1">{{ $data->title }}</h5>
            <div class="text-sm">Author: {{ $data->author }}</div>
            <div class="text-sm">Price: {{ $data->price }}</div>
        </div>

        <div @class([
            'flex flex-row w-full justify-between text-xs',
            'text-black-less' => !$selected,
            'text-gray' => $selected,
        ])>
            <div class="flex flex-row gap-1 items-center">
                <img src="{{ $data->seller->image }}" class="aspect-1 w-5 h-5 rounded-full object-cover" alt="">
                <span>{{ $data->seller->name }}</span>
            </div>

            <span>
                {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
            </span>
        </div>
    </div>
</div>
