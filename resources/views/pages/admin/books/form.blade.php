@php($image = $book->image)

<div class="relative w-full" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true; progress = 0"
    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <form wire:submit.prevent="submit" x-data="imgPreview({{ $image ? "'$image'" : 'null' }})"
        class="flex flex-col gap-3 w-full px-6 py-8 items-center bg-white rounded-3xl">

        <x-input-image id="fileInp" wire:model.defer="photo" class="w-60 h-60 rounded-xl" />
        <x-form-input2 id="titleInp" wire:model.defer="book.title" value="{{ $book->title }}">Title</x-form-input2>
        <x-form-input2 id="authorInp" wire:model.defer="book.author" value="{{ $book->author }}">Author</x-form-input2>
        <x-form-input2 id="priceInp" type="number" wire:model.defer="book.price" value="{{ $book->price }}">Price</x-form-input2>
        <x-form-input2 id="stocksInp" type="number" wire:model.defer="book.stocks" value="{{ $book->stocks }}">Stocks</x-form-input2>
        <x-form-input2 id="starsInp" type="number" wire:model.defer="book.stars" max="5" value="{{ $book->stars }}">Stars</x-form-input2>

        <x-form-select title="Genre" wire:model.defer="book.genre">
            <option value="null" selected disabled>-- Please Select --</option>
            @foreach (\App\Utils\BookGenres::values() as $genre)
            <option value="{{$genre}}">{{Str::ucfirst($genre)}}</option>
            @endforeach
        </x-form-select>

        <x-form-input2 id="descriptionInp" class="h-64" textarea="true" wire:model.defer="book.description" value="{{ $book->description }}">Description</x-form-input2>

        <div class="flex flex-row w-full gap-3">
            <x-button type="submit" class="flex-1">Save</x-button>
            <x-button class="bg-red cursor-pointer !px-2 fill-white" wire:click="delete">@svg('svg/delete.svg')</x-button>
        </div>
    </form>

    <div class="top-0 left-0 absolute w-full h-full flex flex-col justify-center items-center gap-5 text-2.5xl bg-black text-white"
        x-show="isUploading">
        Uploading...
        <x-progress class="max-w-[50%]" max="100" />
    </div>
</div>
