<div class="space-y-12">
    @livewire('slideshow.image.create')

    <div class="grid grid-cols-4 gap-6">
        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image, 'serial_number' => $loop->index + 1], key('image-' .
        $image->id))
        @endforeach
    </div>
</div>