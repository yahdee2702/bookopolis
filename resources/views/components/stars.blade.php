<div>
    @php($starClass = implode(' ', [$attributes->get('class', ''), 'inline-block']))

    @for ($i = 0;$i < $attributes->get("max-value", 5);$i++)
    @if ($attributes->get("value", 0) > $i)
    @svg('svg/star-filled.svg', $starClass)
    @else
    @svg('svg/star-empty.svg', $starClass)
    @endif
    @endfor
</div>
