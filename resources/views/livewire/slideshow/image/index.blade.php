<div class="space-y-12">
    <div class="grid md:grid-cols-2 gap-4 md:gap-12">
        @livewire('slideshow.image.thumbnail', ['tribute' => $tribute, 'editable' => $media_editable])

        @if($appConfig->tribute_media_limit - $tribute->images->count())
        @livewire('slideshow.image.create', ['tribute' => $tribute, 'editable' => $media_editable])
        @else
        <div class="">Media limit exceeded</div>
        @endif
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @if($thumbnail)
        @livewire('slideshow.image.item', ['image' => $thumbnail, 'serializable' => false, 'editable' =>
        $media_editable], key('image-' .
        $thumbnail->id))
        @endif

        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image, 'editable' => $media_editable], key('image-' .
        $image->id))
        @endforeach
    </div>
</div>