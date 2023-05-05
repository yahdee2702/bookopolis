<a href="?category={{$attributes->get("category", "all")}}&page={{(int)($_GET['page'] ?? 1)}}"
    {{$attributes->merge(['class' => "px-5 py-2 rounded-xl block " . ($attributes->get("category", "all") == ($_GET['category'] ?? 'all') ? "bg-black text-white": '')])}}>
    {{Str::ucfirst($attributes->get("category", "all"))}}</a>
