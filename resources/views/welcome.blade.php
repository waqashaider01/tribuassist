@if(auth()->user()->role == 1)
<x-admin-layout>
    @section('page_name', 'Dashboard')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- --}}
            </div>
        </div>
    </div>
</x-admin-layout>

@elseif(auth()->user()->role == 2)
<x-client-layout>
    @section('page_name', 'Dashboard')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- --}}
            </div>
        </div>
    </div>
</x-client-layout>
@endif