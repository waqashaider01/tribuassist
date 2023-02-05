<div class="space-y-12">
    @livewire('slideshow.image.create', ['tribute' => $tribute])

    <div class="grid grid-cols-4 gap-4">
        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image], key('image-' . $image->id))
        @endforeach
    </div>
</div>