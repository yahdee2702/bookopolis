@php

$currentPage = (int)($_GET["page"] ?? 1);
$currentCategory = $_GET["category"] ?? "all";
$currentSearch = $_GET["search"] ?? null;
$pages = $paging["pages"];
$totalPages = $paging["totalPages"];

@endphp

<div class="flex items-center justify-center" >
    <div class="flex flex-row items-center justify-center gap-5 w-full">
        <a href="?page={{$currentPage-1}}{{$currentCategory && $currentCategory != "all" ? "&category=$currentCategory" : ''}}{{$currentSearch ? "&search=$currentSearch" : ''}}" class="w-8 h-8 flex justify-center items-center rounded-md {{ $currentPage > 1 ? "hover:fill-white hover:bg-black" : "invisible" }}">
            @svg('svg/left-control.svg')
        </a>

        <div class="flex flex-row items-center justify-center text-lg font-medium gap-3">

            @foreach($pages as $page)
            @if($currentPage == $page)
            <a href="?page={{$page}}{{$currentCategory ? "&category=$currentCategory" : ''}}{{$currentSearch ? "&search=$currentSearch" : ''}}" class="w-8 h-8 flex justify-center items-center text-white bg-black rounded-md">{{$page}}</a>
            @else
            <a href="?page={{$page}}{{$currentCategory ? "&category=$currentCategory" : ''}}" class="w-8 h-8 flex justify-center items-center hover:text-white hover:bg-black rounded-md">{{$page}}</a>
            @endif
            @endforeach

            @if($pages[count($pages)-1] < $totalPages)
            @if($pages[count($pages)-1]+1 < $totalPages)
            ...
            @endif

            <a href="?page={{$totalPages}}{{$currentCategory ? "&category=$currentCategory" : ''}}{{$currentSearch ? "&search=$currentSearch" : ''}}" class="w-8 h-8 flex justify-center items-center hover:text-white hover:bg-black rounded-md">{{$totalPages}}</a>
            @endif
        </div>

        <a href="?page={{$currentPage+1}}{{$currentCategory ? "&category=$currentCategory" : ''}}{{$currentSearch ? "&search=$currentSearch" : ''}}" class="w-8 h-8 flex justify-center items-center rounded-md {{ $currentPage < $totalPages ? "hover:fill-white hover:bg-black" : "invisible" }}">
            @svg('svg/right-control.svg')
        </a>
    </div>
</div>
