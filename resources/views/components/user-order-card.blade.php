<div @class(["flex flex-row items-center w-full px-5 py-3 gap-2 rounded-xl cursor-pointer", "bg-white" => !$selected, "bg-black text-white" => $selected])>
    <img src="{{$data->user->image}}" class="aspect-1 w-14 h-14 rounded-full" alt="">
    <div class="w-full">
        <div class="flex flex-row justify-between">
            <div class="flex flex-row items-center gap-1">
                <span class="text-lg font-semibold">{{$data->user->username}}</span>
                <span>@svg('svg\caret-right-filled.svg')</span>
                <span class="text-lg font-semibold">{{$data->book->title}}</span>
            </div>
            <span @class(['text-sm', 'text-black-less' => !$selected, 'text-gray' => $selected])>{{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</span>
        </div>
        <div @class(['text-base font-medium', 'text-black-less' => !$selected, 'text-gray' => $selected])>
            <x-stars value="{{$data->book->stars}}" max="5"/>
        </div>
    </div>
</div>

