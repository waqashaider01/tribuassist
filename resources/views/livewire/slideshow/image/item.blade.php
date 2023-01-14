<div class="rounded-xl overflow-hidden border {{$is_thumbnail ? 'border-2 border-green-600' : ''}} p-4">
    <div class="flex justify-between items-center mb-6">
        <div wire:click="setAsThumbnail"
            class="flex-shrink-0 flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden ring-2 {{$is_thumbnail ? 'bg-green-600 ring-green-600' : 'bg-stone-100 ring-stone-100'}} ring-offset-2 transition duration-300 cursor-pointer">
            @if(!$is_thumbnail)
            <span title="Set as thumbnail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </span>
            @else
            <span title="Thumbnail">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 text-white">
                    <path fill-rule="evenodd"
                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <input type="number"
                class="flex justify-center items-center gap-1 h-8 w-20 rounded-xl overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer"
                value="{{$serial_number}}" min="1">

            <a href="{{route('slideshow.image.edit', $image->id)}}"
                class="flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </a>

            <button wire:click="delete"
                class="flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </div>
    </div>

    <a href="{{route('slideshow.image.edit', $image->id)}}">
        <img class="w-full aspect-square rounded-xl overflow-hidden" src="{{asset('storage/'.$image->path)}}">
    </a>

    <div class="mt-3">
        <input wire:model.debounce.500ms="comment" type="text" id="large-input" placeholder="Comment"
            class="block p-4 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-center">
    </div>
</div>