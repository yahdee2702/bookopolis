<form {{$attributes->only('class')->merge(['class' => 'flex flex-row w-full px-5 py-2 gap-5 rounded-lg bg-white border border-gray'])}}>
    <button class="fill-black-less opacity-50" type="submit">@svg('svg/search.svg')</button>
    <input type="search" id="searchBar" name="search" placeholder="Search..." class="text-base w-full outline-none focus:outline-none border-none focus:border-none ring-0 focus:ring-0 p-0 placeholder:text-black-less placeholder:text-opacity-50" {{$attributes->except('class')}}>
</form>
