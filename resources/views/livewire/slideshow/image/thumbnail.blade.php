<div class="">
    <form wire:submit.prevent="uploadThumbnail"
        class="w-full flex flex-col md:flex-row justify-center items-center gap-4 md:gap-0 border md:px-6 py-4 md:py-12 rounded-xl">
        <input wire:model.lazy="thumbnail" {{!$editable ? 'disabled' : '' }} id="thumbnail" type="file"
            class="md:w-96 mx-4">

        <button wire:loading.remove {{!$editable ? 'disabled' : '' }} type="submit"
            class="w-fit md:w-auto md:flex-shrink-0 bg-black text-white font-bold px-4 py-2 rounded-lg">
            Upload Thumbnail
        </button>
    </form>

    @error('thumbnail')
    <small class="text-red-600">{{ $message }}</small>
    @enderror

    @if(session('warning'))
    <small class="text-red-600">{{session('warning')}}</small>
    @endif
</div>