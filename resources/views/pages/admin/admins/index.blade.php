<x-admin-container>
    <x-list-section class="max-w-xl" title="Admins">
        <x-slot name="titleAddon">
            <x-button class="!px-2 self-center fill-white cursor-pointer" wire:click="create">@svg("svg\add.svg", "w-6 h-6")</x-button>
        </x-slot>
        <x-slot name="main">
            @foreach ($admins as $adminI)
                @include('components.admin-card', [
                    'data' => $adminI,
                    'selected' => isset($admin) ? $adminI->id == $admin->id : false,
                    'func' => 'switch',
                ])
            @endforeach
        </x-slot>
    </x-list-section>

    @if ($admin)
        <div class="flex flex-col w-full h-full overflow-y-auto gap-5 p-6">
            <h3 class="text-2.5xl font-semibold">User Detail</h3>

            @include('pages.admin.admins.profile', ['data' => $admin])

            <h3 class="text-2.5xl font-semibold">Edit</h3>

            <livewire:admins-form key="{{now()}}" :admin="$admin"/>
        </div>
    @endif
</x-admin-container>
