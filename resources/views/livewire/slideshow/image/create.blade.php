<form wire:submit.prevent="uploadImage" class="">
    <input wire:model.lazy="image" type="file">
    <button type="submit" class="bg-black text-white font-bold px-4 py-2 rounded-xl">Upload</button>
</form>