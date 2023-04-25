<div @class(["flex flex-row items-center w-full px-5 py-3 gap-2 rounded-xl cursor-pointer", "bg-white" => !$selected, "bg-black text-white" => $selected])>
    <img src="{{$data->admin->image}}" class="aspect-1 w-14 h-14 rounded-full" alt="">
    <div class="w-full">
        <div class="flex flex-row justify-between">
            <span class="text-lg font-semibold">{{$data->admin->name}}</span>
            <span @class(['text-sm', 'text-black-less' => !$selected, 'text-gray' => $selected])>{{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</span>
        </div>
        <div @class(['text-base font-medium', 'text-black-less' => !$selected, 'text-gray' => $selected])>
            {{$data->description}}
        </div>
    </div>
</div>
