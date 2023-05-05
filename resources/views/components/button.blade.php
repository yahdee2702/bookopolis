@if ($attributes->get("type") == "submit")
<button type="submit" {{$attributes->merge(['class' => "text-base max-sm:text-sm text-white px-4 py-2 bg-black rounded-[10px]"])}}>
    {{$slot}}
</button>
@else
<a {{$attributes->merge(['class' => "text-base max-sm:text-sm text-white px-4 py-2 bg-black rounded-[10px]"])}}>
    {{$slot}}
</a>
@endif
