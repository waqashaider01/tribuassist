<div class="space-y-12">
    <div class="grid md:grid-cols-2 gap-4 md:gap-12">
        @livewire('slideshow.image.thumbnail', ['tribute' => $tribute])
        @livewire('slideshow.image.create', ['tribute' => $tribute])
    </div>

    <div class="grid md:grid-cols-4 gap-4">
        @if($thumbnail)
        @livewire('slideshow.image.item', ['image' => $thumbnail, 'serializable' => false], key('image-' .
        $thumbnail->id))
        @endif

        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image], key('image-' . $image->id))
        @endforeach
    </div>
</div>