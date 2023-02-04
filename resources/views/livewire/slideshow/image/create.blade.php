<form wire:submit.prevent="uploadImage" class="flex justify-center items-center border px-6 py-12 rounded-xl">
    <input wire:model.lazy="images" type="file" multiple>
    <button wire:loading.remove type="submit" class="bg-black text-white font-bold px-4 py-2 rounded-lg">Upload</button>
</form>