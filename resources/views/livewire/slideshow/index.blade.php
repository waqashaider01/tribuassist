@if(session('_tati_') || $is_editable)
<div class="px-4 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="space-y-8">
            <div class="grid grid-cols-3 bg-white rounded-xl   p-4">
                <div class="col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                        </svg>
                        <h2 class="text-2xl font-bold">{{$funeralHome->name}}</h2>
                    </div>

                    <div class="text-sm text-gray-500">
                        <div class="">{{$funeralHome->street}},</div>
                        <div class="">{{$funeralHome->city->name}},</div>
                        <div class="">{{$funeralHome->state->name}},</div>
                        <div class="">{{$funeralHome->zip}}</div>
                    </div>
                </div>

                @if($can_logout)
                <div class="flex md:justify-center items-center">
                    <button wire:click="logout"
                        class="w-fit flex justify-center items-center   bg-green-600 hover:bg-green-700 text-white px-1 sm:px-4  py-3 font-semibold rounded-lg duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Logout
                    </button>
                </div>
                @endif
            </div>

            <div class="bg-white rounded-xl overflow-hidden p-1 sm:p-6">
                <div class="flex items-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <h2 class="text-2xl font-bold">{{$tribute->first_name . ' ' . $tribute->last_name}}</h2>
                </div>

                <table class="w-full text-sm text-gray-500 border">
                    <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
                        <th class="w-1/4">Tribute Id</th>
                        <td class="font-bold">{{$tribute->record_id}}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
                        <th class="w-1/4">Tribute Media Capacity</th>
                        <td class="font-bold">{{$appConfig->tribute_media_limit}}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
                        <th class="w-1/4">Current Count</th>
                        <td class="font-bold">{{$tribute->images->count()}}</td>
                    </tr>
                    <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
                        <th class="w-1/4">Remaining</th>
                        <td class="font-bold">{{$appConfig->tribute_media_limit - $tribute->images->count()}}</td>
                    </tr>
                </table>
            </div>

            @livewire('slideshow.preferences', ['tribute' => $tribute])
            @livewire('slideshow.thumbnail-management', ['tribute' => $tribute])
            @livewire('slideshow.media-management', ['tribute' => $tribute])

            <div class="flex items-center gap-3">
                @if($tribute->status == 0 && !$is_submitable)
                <button wire:click="checkIfSubmitable"
                    class="flex items-center gap-2 px-4 py-3 rounded-lg bg-green-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    Check Submitability
                </button>
                @endif

                @if($tribute->status == 0 && $is_submitable)
                <button wire:click="submit"
                    class="flex items-center gap-2 px-4 py-3 rounded-lg bg-green-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    Submit
                </button>
                @endif

                @if($tribute->status == 3)
                <div class="flex items-center" x-data="{reorder: false}">
                    <button x-on:click="reorder = true" x-show="!reorder"
                        class="flex items-center gap-2 px-4 py-3 rounded-lg bg-green-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Edit Newly
                    </button>

                    <button wire:click="editAgain" x-show="reorder"
                        class="flex items-center gap-2 px-4 py-3 rounded-lg bg-red-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Confirm Edit Newly
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<div class="h-screen py-12 bg-white">
    <form wire:submit.prevent="authenticate"
        class="h-full md:w-1/4 mx-auto flex justify-center items-center px-6 lg:px-8">
        <div class="space-y-4">
            <div class="flex items-center h-fit w-full border rounded-xl overflow-hidden" x-data="{password: true}">
                <div class="text-stone-700 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round"
                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                </div>

                <input wire:model.defer="tribute_id" type="text" class="w-full p-4 border-none focus:ring-0"
                    placeholder="Tribute Id">
            </div>

            <div class="flex items-center h-fit w-full border rounded-xl overflow-hidden" x-data="{password: true}">
                <div class="text-stone-700 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                </div>

                <input wire:model.defer="password" :type="password ? 'password' : 'text'"
                    class="w-full p-4 border-none focus:ring-0" placeholder="Password">

                <div class="h-full text-stone-500">
                    <div x-show="password" @click="password = !password" class="h-full mr-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    <div x-show="!password" @click="password = !password" class="h-full mr-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </div>
                </div>
            </div>

            @if(session('warning'))
            <small class="text-red-600">{{session('warning')}}</small>
            @endif

            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-3 font-semibold rounded-lg duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                Login
            </button>
        </div>
    </form>
</div>
</div>
@endif