<x-admin-container>
    <x-list-section class="max-w-xl" title="Book">
        <x-slot name="titleAddon">
            <x-button class="!px-2 self-center fill-white cursor-pointer" wire:click="create">@svg('svg/add.svg', 'w-6 h-6')</x-button>
        </x-slot>
        <x-slot name="main">
            @foreach ($books as $bookI)
                @include('components.book-card', [
                    'data' => $bookI,
                    'selected' => isset($book) ? $bookI->id == $book->id : false,
                    'func' => 'switch',
                ])
            @endforeach
        </x-slot>
    </x-list-section>

    @if ($book)
        <div class="flex flex-col w-full h-full overflow-y-auto gap-5 p-6">
            <h3 class="text-2.5xl font-semibold">Book Detail</h3>

            @include('pages.admin.books.profile', ['data' => $book])

            <h3 class="text-2.5xl font-semibold">Edit</h3>

            <livewire:books-form key="{{now()}}" :book="$book"/>
        </div>
    @endif
</x-admin-container>
