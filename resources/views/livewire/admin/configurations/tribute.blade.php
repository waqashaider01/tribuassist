<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Tribute settings') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Define how much files can be uploaded under a tribute.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tribuassist_media_limit" value="{{ __('Media limit') }}" />
            <x-jet-input id="tribuassist_media_limit" type="text" class="mt-1 block w-full"
                wire:model.defer="tribuassist_media_limit" autocomplete="tribuassist_media_limit" />
            <x-jet-input-error for="tribuassist_media_limit" class="mt-2" />
        </div>
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