<a @class(['text-lg px-1 pb-1', 'border-b-[1.5px] border-black' => $attributes->get("selected", false)]) {{$attributes->except("selected")}}>{{$slot}}</a>
