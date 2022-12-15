<div class="rounded-xl overflow-hidden border">
    <a href="{{route('slideshow.image.edit', $image->id)}}" target="_blank" rel="noopener noreferrer">
        <img class="w-full aspect-square" src="{{asset('storage/'.$image->path)}}" alt="{{$image->id}}">
    </a>

    <textarea wire:model.debounce.500ms="comment" class="border-none focus:ring-0 text-gray-600"
        placeholder="Comment"></textarea>
</div>