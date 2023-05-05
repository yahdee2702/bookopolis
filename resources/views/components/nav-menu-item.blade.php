<a @class(['text-lg px-page max-md:px-8 py-3', 'bg-black text-white' => $attributes->get("selected", false)]) {{$attributes->except("selected")}}>{{$slot}}</a>
