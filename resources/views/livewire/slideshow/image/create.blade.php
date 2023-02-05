<form wire:submit.prevent="uploadImage" class="w-full flex justify-center items-center border px-6 py-12 rounded-xl">
    <input wire:model.lazy="images" type="file" multiple class="w-96 mx-4">
    <button wire:loading.remove type="submit" class="bg-black text-white font-bold px-4 py-2 rounded-lg">Upload</button>
</form>