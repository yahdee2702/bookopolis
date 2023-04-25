<label for="{{$attributes->get("id", "fileUpload")}}" {{$attributes->only("class")->merge(['class' => 'rounded-full overflow-clip cursor-pointer object-cover'])}}>
    <img :src="imgsrc" id="{{$attributes->get('target', 'uploadedImage')}}" class="w-full h-full object-cover" wire:ignore>
    <input {{$attributes->except(['class', 'src'])}} type="file" id="fileUpload" target="uploadedImage" class="hidden" accept="image/png, image/jpeg" @@change="previewFile" x-ref="myFile">
</label>
