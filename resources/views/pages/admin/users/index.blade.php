<x-admin-container>
    <x-list-section class="max-w-xl" title="Users">
        <x-slot name="titleAddon">
            <x-button class="!px-2 self-center fill-white cursor-pointer" wire:click="create">@svg("svg\add.svg", "w-6 h-6")</x-button>
        </x-slot>
        <x-slot name="main">
            @foreach ($users as $userI)
                @include('components.user-card', [
                    'data' => $userI,
                    'selected' => isset($user) ? $userI->id == $user->id : false,
                    'func' => 'switch',
                ])
            @endforeach
        </x-slot>
    </x-list-section>

    @if ($user)
        <div class="flex flex-col w-full h-full overflow-y-auto gap-5 p-6">
            <h3 class="text-2.5xl font-semibold">User Detail</h3>

            @include('pages.admin.users.profile', ['data' => $user])

            <h3 class="text-2.5xl font-semibold">Edit</h3>

            <livewire:users-form key="{{now()}}" :user="$user"/>
        </div>
    @endif
</x-admin-container>
