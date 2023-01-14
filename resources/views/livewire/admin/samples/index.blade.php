@section('page_name', 'Samples')

<article>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div wire:id="dQouUnubmsgf8JoTwqz0" class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                </div>

                <div class="px-4 sm:px-0">

                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="updateProfileInformation">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Profile Photo -->

                            <!-- Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Name
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="name" type="text" wire:model.defer="state.name" autocomplete="name">
                            </div>

                            <!-- Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="email">
                                    Email
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    id="email" type="email" wire:model.defer="state.email">

                            </div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <div x-data="{ shown: false, timeout: null }"
                            x-init="window.livewire.find('dQouUnubmsgf8JoTwqz0').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                            x-show.transition.out.opacity.duration.1500ms="shown"
                            x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                            class="text-sm text-gray-600 mr-3">
                            Saved.
                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                            wire:loading.attr="disabled" wire:target="photo">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div wire:id="LB5mvnmPJMERSrbco8iR" class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Update Password</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            Ensure your account is using a long, random password to stay secure.
                        </p>
                    </div>

                    <div class="px-4 sm:px-0">

                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="updatePassword">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="current_password">
                                        Current Password
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="current_password" type="password" wire:model.defer="state.current_password"
                                        autocomplete="current-password">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="password">
                                        New Password
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="password" type="password" wire:model.defer="state.password"
                                        autocomplete="new-password">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                                        Confirm Password
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="password_confirmation" type="password"
                                        wire:model.defer="state.password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <div x-data="{ shown: false, timeout: null }"
                                x-init="window.livewire.find('LB5mvnmPJMERSrbco8iR').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                                x-show.transition.out.opacity.duration.1500ms="shown"
                                x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                                class="text-sm text-gray-600 mr-3">
                                Saved.
                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>