<div class="bg-white rounded-xl overflow-hidden">
    <h2 class="bg-green-600 text-white font-bold px-4 py-3">
        Thumbnail Management
    </h2>

    <div class="p-2 md:p-8">
        <div class="space-y-12">
            <div class=" sm:grid md:grid-cols-3 gap-4">
                @livewire('slideshow.image.item', ['image' => $thumbnail, 'serializable' => false, 'editable' =>
                $media_editable], key('image-' .
                $thumbnail->id))

                <div class="md:col-span-2">
                    @livewire('slideshow.image.thumbnail', ['tribute' => $tribute, 'editable' => $media_editable])
                </div>
            </div>
        </div>
    </div>
</div>