<div class="{{$attributes->merge(['class.div' => 'w-full'])->get('class.div')}}">
    <label for="{{$attributes->get('id', 'unnamedInput')}}">{{$slot}}</label>

    @if($attributes->get('textarea', false))
    <textarea {{$attributes->except(['class.div', 'value', 'textarea'])->merge(['class' => 'w-full border border-gray rounded-lg px-5 py-2 mt-2 focus:border-black outline-none focus:outline-none ring-0 focus:ring-0'])}} id="unnamedInput">{{$attributes->get('value')}}</textarea>
    @else
    <input {{$attributes->except(['class.div', 'value', 'textarea'])->merge(['class' => 'w-full border border-gray rounded-lg px-5 py-2 mt-2 focus:border-black outline-none focus:outline-none ring-0 focus:ring-0'])}} id="unnamedInput">
    @endif
</div>
