@section('page_name', 'Samples: Edit')

<article>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('Slideshow Samples') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Create all type of slideshow samples.') }}
                <br>
                {{ __('Ex: slideshow style, tribute theme and background music.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-2">
                    <x-jet-label for="type" value="{{ __('File Type') }}" />
                    <select id="type"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        wire:model="type" required>
                        <option value="1">{{__('Slideshow Style')}}</option>
                        <option value="2">{{__('Tribute Theme')}}</option>
                        <option value="3">{{__('Background Music')}}</option>
                        <option value="4">{{__('DVD Package Theme')}}</option>
                    </select>
                    <x-jet-input-error for="type" class="mt-2" />
                </div>

                <div class="col-span-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title"
                        autocomplete="title" required />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>

                @if($type == 1 || $type == 2)
                <div class="col-span-3">
                    <x-jet-label for="file" value="{{ __('Video File') }}" />
                    <x-jet-input id="file" type="file" accept="video/*" class="mt-1 block p-2 w-full border"
                        wire:model.defer="file" autocomplete="file" />
                    <x-jet-input-error for="file" class="mt-2" />
                </div>
                @elseif($type == 3)
                <div class="col-span-3">
                    <x-jet-label for="file" value="{{ __('Audio File') }}" />
                    <x-jet-input id="file" type="file" accept=".mp3, .wma" class="mt-1 block p-2 w-full border"
                        wire:model.defer="file" autocomplete="file" />
                    <x-jet-input-error for="file" class="mt-2" />
                </div>
                @elseif($type == 4)
                <div class="col-span-3">
                    <x-jet-label for="file" value="{{ __('Image File') }}" />
                    <x-jet-input id="file" type="file" accept="image/*" class="mt-1 block p-2 w-full border"
                        wire:model.defer="file" autocomplete="file" />
                    <x-jet-input-error for="file" class="mt-2" />
                </div>
                @endif
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="tribuassist_media_limit">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    </div>
</article>