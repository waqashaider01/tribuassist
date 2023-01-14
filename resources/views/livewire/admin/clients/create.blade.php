@section('page_name', 'Clients: Create')

<article>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('Tribute settings') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Define how much files can be uploaded under a tribute.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-3">
                    <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                    <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name"
                        autocomplete="first_name" />
                    <x-jet-input-error for="first_name" class="mt-2" />
                </div>
                <div class="col-span-3">
                    <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name"
                        autocomplete="last_name" />
                    <x-jet-input-error for="last_name" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="email"
                        autocomplete="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <div class="col-span-3">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone"
                        autocomplete="phone" />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>
                {{-- --}}
                <div class="col-span-6">
                    <x-jet-label for="street" value="{{ __('Street') }}" />
                    <x-jet-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="street"
                        autocomplete="street" />
                    <x-jet-input-error for="street" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="doing_business_as" value="{{ __('DBA') }}" />
                    <x-jet-input id="doing_business_as" type="text" class="mt-1 block w-full"
                        wire:model.defer="doing_business_as" autocomplete="doing_business_as" />
                    <x-jet-input-error for="doing_business_as" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="zip" value="{{ __('ZIP') }}" />
                    <x-jet-input id="zip" type="text" class="mt-1 block w-full" wire:model.defer="zip"
                        autocomplete="zip" />
                    <x-jet-input-error for="zip" class="mt-2" />
                </div>

                <div wire:ignore class="col-span-3">
                    <x-jet-label for="state" value="{{ __('State') }}" />
                    <select id="state" class="mt-1 block w-full" wire:model.defer="state">
                        <option value="">{{__('Select State')}}</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="state" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <select id="city"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        wire:model.defer="city">
                        <option value="">{{__('Select City')}}</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="city" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="notification_email" value="{{ __('Notification Email') }}" />
                    <x-jet-input id="notification_email" type="text" class="mt-1 block w-full"
                        wire:model.defer="notification_email" autocomplete="notification_email" />
                    <x-jet-input-error for="notification_email" class="mt-2" />
                </div>

                <div class="col-span-3">
                    <x-jet-label for="website" value="{{ __('Notification Email') }}" />
                    <x-jet-input id="website" type="text" class="mt-1 block w-full" wire:model.defer="website"
                        autocomplete="website" />
                    <x-jet-input-error for="website" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-jet-label for="services" value="{{ __('Services') }}" />
                    <textarea id="services" type="text" wire:model.defer="services"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        autocomplete="services" placeholder="Seperate by comma (,)"></textarea>
                    <x-jet-input-error for="services" class="mt-2" />
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
                @this.set('state', data);
            });

            // $('#city').select2();
            // $('#city').on('change', function (e) {
            //     var data = $('#city').select2('val');
            //     @this.set('city', data);
            // });
        });
</script>
@endpush