<div @if($serializable) wire:key="{{ $image->id }}" wire:sortable.item="{{ $image->id }}" wire:sortable.handle
    style="cursor: move;" @endif
    class="rounded-xl overflow-hidden border {{$is_thumbnail ? 'border-2 border-green-600' : ''}} p-4">
    <div class="flex justify-between items-center mb-6">

        @if(!$serializable)
        <div class="flex-shrink-0 flex items-center gap-1 text-green-600 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="hidden md:block">Thumb</span>
        </div>
        @endif

        <div class="flex justify-between items-center gap-4">
            @if(!$serializable)
            <label for="thumbnail"
                class="flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </label>
            @endif

            <a href="{{$editable ? route('slideshow.image.edit', $image->id) : '#'}}"
                class="flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer {{!$editable ? 'opacity-50 cursor-not-allowed' : 'opacity-100' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </a>

            @if($serializable)
            <button wire:click="delete" {{!$editable ? 'disabled' : '' }}
                class="flex justify-center items-center gap-1 h-8 w-8 rounded-full overflow-hidden bg-stone-100 ring-2 ring-stone-100 ring-offset-2 transition duration-300 cursor-pointer {{!$editable ? 'opacity-50 cursor-not-allowed' : 'opacity-100' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
            @endif
        </div>
    </div>

    <div class="h-32 md:h-52 w-full rounded-xl overflow-hidden bg-contain bg-no-repeat bg-center"
        style="background-image: url('{{asset('storage/'.$image->path)}}')"></div>

    <div class="mt-3">
        <input wire:model.lazy="comment" {{!$editable ? 'disabled' : '' }} type="text" id="large-input"
            placeholder="Comment"
            class="block p-4 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-center">
    </div>
</div>