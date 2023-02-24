@section('page_name', 'Funeral Homes')

<div class="min-h-[79vh] p-6 flex flex-col gap-6">
    <div class="flex items-end gap-2">
        <a href="{{route('funeral_homes.create')}}"
            class="flex items-center gap-2 h-12 w-fit px-4 border border-blue-900 rounded-xl bg-white text-blue-900">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus"
                viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            Create
        </a>
    </div>

    <div class="flex gap-2 md:gap-4">
        <div class="w-full flex items-center bg-white rounded-md border">
            <div class="p-4 pr-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.5 21.75C5.85 21.75 1.25 17.15 1.25 11.5C1.25 5.85 5.85 1.25 11.5 1.25C17.15 1.25 21.75 5.85 21.75 11.5C21.75 17.15 17.15 21.75 11.5 21.75ZM11.5 2.75C6.67 2.75 2.75 6.68 2.75 11.5C2.75 16.32 6.67 20.25 11.5 20.25C16.33 20.25 20.25 16.32 20.25 11.5C20.25 6.68 16.33 2.75 11.5 2.75Z"
                        fill="#828282" />
                    <path
                        d="M21.9999 22.75C21.8099 22.75 21.6199 22.68 21.4699 22.53L19.4699 20.53C19.1799 20.24 19.1799 19.76 19.4699 19.47C19.7599 19.18 20.2399 19.18 20.5299 19.47L22.5299 21.47C22.8199 21.76 22.8199 22.24 22.5299 22.53C22.3799 22.68 22.1899 22.75 21.9999 22.75Z"
                        fill="#828282" />
                </svg>
            </div>
            <input wire:model.debounce.1000ms="keyword" type="text" placeholder="Search"
                class="w-full border-none focus:ring-0">
        </div>

        <div class="flex items-center bg-white rounded-md border">
            <input wire:model.lazy="qty" type="number" min="1" class="w-full border-none focus:ring-0">
        </div>
    </div>

    <div class="w-full overflow-auto bg-white">
        {{-- <div class="px-6 py-8 text-xl font-semibold">Funeral Homes</div> --}}

        <div class="w-full overflow-auto">
            <table class="w-full text-left">
                <thead class="w-full">
                    <tr class="table-header">
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Total Tributes</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-stone-200">
                    @foreach ($funeral_homes as $funeral_home)
                    @livewire('admin.funeral-homes.item', ['funeral_home' => $funeral_home], key($funeral_home->id))
                    @endforeach
                </tbody>
            </table>

            @if($funeral_homes && $funeral_homes->links())
            {{ $funeral_homes->links() }}
            @endif
        </div>
    </div>
</div>