<div class="space-y-12">
    <div class="">
        @if($appConfig->tribute_media_limit - $tribute->images->count())
        @livewire('slideshow.image.create', ['tribute' => $tribute, 'editable' => $media_editable])
        @else
        <div class="">Media limit reached</div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4" wire:sortable="reorder" id="sortable-list">
        @foreach ($images as $image)
        @livewire('slideshow.image.item', ['image' => $image, 'editable' => $media_editable], key('image-' .
        $image->id))
        @endforeach
    </div>
</div>

@push('scripts')
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
<script>
    Sortable.create(document.getElementById('sortable-list'), {
        onEnd: function(event) {
            var id = event.clone.attributes[1].value;
            Livewire.emit('reorder', id, event.newIndex, event.oldIndex);
        }  
    });

    
</script>  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
<script>
    var scrolling = false;
    var delay = 3000; // set delay time in milliseconds
    var timeoutId;

    Sortable.create(document.getElementById('sortable-list'), {
        onStart: function () {
            if (isTouchDevice()) {
                scrolling = false;
                timeoutId = setTimeout(function () {
                    scrolling = true;
                }, delay);
            }
        },
        onEnd: function(event) {
            clearTimeout(timeoutId);
            if (!scrolling) {
                var id = event.clone.attributes[1].value;
                Livewire.emit('reorder', id, event.newIndex, event.oldIndex);
            }
        }
    });

    function isTouchDevice() {
        return 'ontouchstart' in window || navigator.maxTouchPoints;
    }
</script>



@endpush