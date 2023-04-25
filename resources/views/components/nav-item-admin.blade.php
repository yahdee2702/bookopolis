<a {{$attributes->except('class')}} @class(["px-2 py-2 rounded-lg fill-gray", "bg-blue fill-white" => $attributes->get('selected', false)])>
    {{$slot}}
</a>
