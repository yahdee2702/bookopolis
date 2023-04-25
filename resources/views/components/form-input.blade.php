
<div class="flex flex-col gap-2">
    <label class="flex flex-row w-full px-5 py-2 gap-5 rounded-lg bg-white border border-gray" for="{{$attributes->get('id', 'unnamedInput')}}" {{$attributes->only('class')}}>
        <div class="self-center w-fit flex-none shrink-1 fill-black-less opacity-50">{{$slot ?? ""}}</div>

        {{$attributes->get('textarea')}}
        @if ($attributes->get('textarea', false) == true)
        <textarea class="text-base w-full h-full outline-none focus:outline-none border-none focus:border-none ring-0 focus:ring-0 p-0 placeholder:text-black-less placeholder:text-opacity-50" id="unnamedInput" {{$attributes->except(['class', 'textarea', 'value', 'errormsg'])}}>{{$attributes->get('value')}}</textarea>
        @else
        <input class="text-base w-full outline-none focus:outline-none border-none focus:border-none ring-0 focus:ring-0 p-0 placeholder:text-black-less placeholder:text-opacity-50" id="unnamedInput" {{$attributes->except(['class', 'textarea', 'errormsg'])}}>
        @endif
    </label>

    @error($attributes->get('name', ''))
    <div class="text-red">{{$attributes->get('errormsg', 'InternalServer error!')}}</div>
    @enderror
</div>
