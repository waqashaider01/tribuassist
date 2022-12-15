<div class="space-y-12">
    @livewire('slideshow.image.create')

    <div class="grid grid-cols-6 gap-4">
        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image], key($image->id))
        @endforeach
    </div>
</div>