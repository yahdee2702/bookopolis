<x-admin-layout title="Home" navTitle="Home" selected="-1">
    <div class="flex flex-row w-full h-full gap-20">
        <x-list-section title="Recent Activities">
            @foreach ($activities as $activity)
            @include('components.activity-card', ['data' => $activity, 'selected' => false])
            @endforeach
        </x-list-section>

        <x-list-section title="Recent Orders">
            @foreach ($orders as $order)
            @include('components.user-order-card', ['data' => $order, 'selected' => false])
            @endforeach
        </x-list-section>
    </div>
</x-admin-layout>
