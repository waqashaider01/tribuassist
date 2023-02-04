<div class="bg-white rounded-xl overflow-hidden">
    <h2 class="bg-green-600 text-white font-bold px-4 py-3">
        Slideshow Preferences
    </h2>

    <div class="p-8">
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1">
                    <span>Video Style</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div wire:ignore.self id="accordion-collapse-body-1" class="hidden"
                aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 space-y-8">
                    <div class="">
                        <select wire:model.lazy="style_id"
                            class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                            <option value="">Select Style</option>

                            @foreach ($styles as $style)
                            <option value="{{$style->id}}">{{$style->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($styles as $style)
                        <div class="rounded-xl overflow-hidden border p-4">
                            <video controls>
                                <source src="{{asset('storage/' . $style->path)}}" type="video/mp4">
                            </video>

                            <div class="flex justify-center mt-6">
                                <button wire:click="selectStyle('{{$style->id}}')"
                                    class="{{$style->id == $style_id ? 'bg-green-600 text-white' : 'border border-green-600 text-green-600'}} hover:bg-green-600 hover:text-white px-3 py-1 rounded-lg duration-300"
                                    {{$style->id == $style_id ? 'disabled' : ''}}>
                                    {{$style->id == $style_id ? 'Selected' : 'Select'}}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Tribute Theme</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div wire:ignore.self id="accordion-collapse-body-2" class="hidden"
                aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200 space-y-8">
                    <div class="">
                        <select wire:model.lazy="theme_id"
                            class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                            <option value="">Select Theme</option>

                            @foreach ($themes as $theme)
                            <option value="{{$theme->id}}">{{$theme->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($themes as $theme)
                        <div class="rounded-xl overflow-hidden border p-4">
                            <video controls>
                                <source src="{{asset('storage/' . $theme->path)}}" type="video/mp4">
                            </video>

                            <div class="flex justify-center mt-6">
                                <button wire:click="selectTheme('{{$theme->id}}')"
                                    class="{{$theme->id == $theme_id ? 'bg-green-600 text-white' : 'border border-green-600 text-green-600'}} hover:bg-green-600 hover:text-white px-3 py-1 rounded-lg duration-300"
                                    {{$theme->id == $theme_id ? 'disabled' : ''}}>
                                    {{$theme->id == $theme_id ? 'Selected' : 'Select'}}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>Background Music</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div wire:ignore.self id="accordion-collapse-body-3" class="hidden"
                aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-b-0 border-gray-200 space-y-8">
                    <div class="">
                        <button wire:click="randomMusic"
                            class="border border-green-600 text-green-600 hover:bg-green-600 hover:text-white px-3 py-1 rounded-lg duration-300">
                            Random Selection
                        </button>
                    </div>
                    <div wire:ignore class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="selection1-tab"
                                    data-tabs-target="#selection1" type="button" role="tab" aria-controls="selection1"
                                    aria-selected="false">Selection 1</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="selection2-tab" data-tabs-target="#selection2" type="button" role="tab"
                                    aria-controls="selection2" aria-selected="false">Selection 2</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="selection3-tab" data-tabs-target="#selection3" type="button" role="tab"
                                    aria-controls="selection3" aria-selected="false">Selection 3</button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="selection4-tab" data-tabs-target="#selection4" type="button" role="tab"
                                    aria-controls="selection4" aria-selected="false">Selection 4</button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="selection5-tab" data-tabs-target="#selection5" type="button" role="tab"
                                    aria-controls="selection5" aria-selected="false">Selection 5</button>
                            </li>
                        </ul>
                    </div>

                    <div id="myTabContent">
                        <div wire:ignore.self class="hidden rounded-lg" id="selection1" role="tabpanel"
                            aria-labelledby="selection1-tab">
                            <select wire:model.lazy="music1_id"
                                wire:change="selectMusic($event.target.value, 'music1_id')"
                                class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                                <option value="">Select Music</option>

                                @foreach ($musics as $music)
                                <option value="{{$music->id}}">{{$music->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div wire:ignore.self class="hidden rounded-lg" id="selection2" role="tabpanel"
                            aria-labelledby="selection2-tab">
                            <select wire:model.lazy="music2_id"
                                wire:change="selectMusic($event.target.value, 'music2_id')"
                                class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                                <option value="">Select Music</option>

                                @foreach ($musics as $music)
                                <option value="{{$music->id}}">{{$music->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div wire:ignore.self class="hidden rounded-lg" id="selection3" role="tabpanel"
                            aria-labelledby="selection3-tab">
                            <select wire:model.lazy="music3_id"
                                wire:change="selectMusic($event.target.value, 'music3_id')"
                                class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                                <option value="">Select Music</option>

                                @foreach ($musics as $music)
                                <option value="{{$music->id}}">{{$music->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div wire:ignore.self class="hidden rounded-lg" id="selection4" role="tabpanel"
                            aria-labelledby="selection4-tab">
                            <select wire:model.lazy="music4_id"
                                wire:change="selectMusic($event.target.value, 'music4_id')"
                                class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                                <option value="">Select Music</option>

                                @foreach ($musics as $music)
                                <option value="{{$music->id}}">{{$music->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div wire:ignore.self class="hidden rounded-lg" id="selection5" role="tabpanel"
                            aria-labelledby="selection5-tab">
                            <select wire:model.lazy="music5_id"
                                wire:change="selectMusic($event.target.value, 'music5_id')"
                                class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                                <option value="">Select Music</option>

                                @foreach ($musics as $music)
                                <option value="{{$music->id}}">{{$music->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-4">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">
                    <span>DVD Package Theme</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div wire:ignore.self id="accordion-collapse-body-4" class="hidden border-b"
                aria-labelledby="accordion-collapse-heading-4">
                <div class="p-5 border border-b-0 border-gray-200 space-y-8">
                    <div class="">
                        <select wire:model.lazy="package_theme_id"
                            class="px-4 h-12 w-full border border-stone-300 focus:border-stone-200 focus:ring-0 rounded-lg">
                            <option value="">Select Theme</option>

                            @foreach ($package_themes as $theme)
                            <option value="{{$theme->id}}">{{$theme->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($package_themes as $theme)
                        <div class="rounded-xl overflow-hidden border p-4">
                            <div>
                                <img src="{{asset('storage/' . $theme->path)}}">
                            </div>

                            <div class="flex justify-center mt-6">
                                <button wire:click="selectPackageTheme('{{$theme->id}}')"
                                    class="{{$theme->id == $package_theme_id ? 'bg-green-600 text-white' : 'border border-green-600 text-green-600'}} hover:bg-green-600 hover:text-white px-3 py-1 rounded-lg duration-300"
                                    {{$theme->id == $package_theme_id ? 'disabled' : ''}}>
                                    {{$theme->id == $package_theme_id ? 'Selected' : 'Select'}}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>