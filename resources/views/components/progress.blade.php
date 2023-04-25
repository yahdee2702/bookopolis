<div {{$attributes->only('class')->merge(['class' => 'w-full bg-gray rounded-full'])}}>
    <div class="bg-blue text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" :style="{width: progress * 100 / {{$attributes->get('max', 100)}} + "%"}">
        <span x-text="progress"></span>%
    </div>
</div>
