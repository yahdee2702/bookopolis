@php($image = $admin->image)

<div class="relative w-full" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true; progress = 0"
    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <form wire:submit.prevent="submit" x-data="imgPreview({{ $image ? "'$image'" : 'null' }})"
        class="flex flex-col gap-3 w-full px-6 py-8 items-center bg-white rounded-3xl">

        <x-input-image id="fileInp" wire:model.defer="photo" class="w-60 h-60" />
        <x-form-input2 id="nameInp" wire:model.defer="admin.name" value="{{ $admin->name }}">Full Name
        </x-form-input2>
        <x-form-input2 id="usernameInp" wire:model.defer="admin.username" value="{{ $admin->username }}">Username
        </x-form-input2>
        <x-form-input2 id="passInp" type="password" wire:model.defer="password">Password</x-form-input2>

        <div class="flex flex-row w-full gap-3">
            <x-button type="submit" class="flex-1">Save</x-button>
            <x-button class="bg-red cursor-pointer !px-2 fill-white" wire:click="delete">@svg('svg\delete.svg')</x-button>
        </div>
    </form>

    <div class="top-0 left-0 absolute w-full h-full flex flex-col justify-center items-center gap-5 text-2.5xl bg-black text-white"
        x-show="isUploading">
        Uploading...
        <x-progress class="max-w-[50%]" max="100"/>
    </div>
</div>
