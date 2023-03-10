@section('page_name', 'Tributes: Edit')

<article>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('Tributes') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Here you can modify tribute data.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-3">
                    <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                    <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name"
                        autocomplete="first_name" required />
                    <x-jet-input-error for="first_name" class="mt-2" />
                </div>
                <div class="col-span-3">
                    <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name"
                        autocomplete="last_name" required />
                    <x-jet-input-error for="last_name" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="dob" value="{{ __('Date of Birth') }}" />
                    <x-jet-input id="dob" type="date" class="mt-1 block w-full" wire:model.defer="dob"
                        autocomplete="dob" required />
                    <x-jet-input-error for="dob" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="dod" value="{{ __('Date of Death') }}" />
                    <x-jet-input id="dod" type="date" class="mt-1 block w-full" wire:model.defer="dod"
                        autocomplete="dod" required />
                    <x-jet-input-error for="dod" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="contact_name" value="{{ __('Contact Name') }}" />
                    <x-jet-input id="contact_name" type="text" class="mt-1 block w-full" wire:model.defer="contact_name"
                        autocomplete="contact_name" required />
                    <x-jet-input-error for="contact_name" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="contact_email" value="{{ __('Contact Email') }}" />
                    <x-jet-input id="contact_email" type="text" class="mt-1 block w-full"
                        wire:model.defer="contact_email" autocomplete="contact_email" required />
                    <x-jet-input-error for="contact_email" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="password" value="{{ __('Tribute Password') }}" />
                    <x-jet-input id="password" type="text" class="mt-1 block w-full" wire:model.defer="password"
                        autocomplete="password" required />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="tribute_media_limit">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    </div>
</article>


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
            $('#state').select2();
            $('#state').on('change', function (e) {
                var data = $('#state').select2('val');
                @this.set('state_id', data);
            });

            // $('#city').select2();
            // $('#city').on('change', function (e) {
            //     var data = $('#city').select2('val');
            //     @this.set('city', data);
            // });
        });
</script>
@endpush