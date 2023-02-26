@section('page_name', 'Order: Details')

<div class="bg-white p-8">
    <table class="w-full border">
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Record ID</th>
            <td>{{$tribute->record_id}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Name</th>
            <td>{{$tribute->first_name . ' ' . $tribute->last_name}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Date of Brith</th>
            <td>{{$tribute->dob}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Date of Death</th>
            <td>{{$tribute->dod}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Contact Name</th>
            <td>{{$tribute->contact_name}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Contact Email</th>
            <td>{{$tribute->contact_email}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Actions</th>
            <td>
                <div class="flex items-center gap-2">

                    {{-- @if($tribute->status == 1)
                    <button wire:click="processOrder"
                        class="flex items-center gap-2 text-white bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                        Process Order
                    </button>
                    @endif --}}

                    @if($tribute->status != 0)
                    <button wire:click="downloadTxt" title="Download .txt file"
                        class="text-blue-900 bg-stone-100 hover:text-white hover:bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="h-6 w-6" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V14a2 2 0 0 1-2 2h-2v-1h2a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.928 15.849v-3.337h1.136v-.662H0v.662h1.134v3.337h.794Zm4.689-3.999h-.894L4.9 13.289h-.035l-.832-1.439h-.932l1.228 1.983-1.24 2.016h.862l.853-1.415h.035l.85 1.415h.907l-1.253-1.992 1.274-2.007Zm1.93.662v3.337h-.794v-3.337H6.619v-.662h3.064v.662H8.546Z" />
                        </svg>
                    </button>

                    <button wire:click="downloadZip" title="Download media archive"
                        class="text-blue-900 bg-stone-100 hover:text-white hover:bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="h-6 w-6" viewBox="0 0 16 16">
                            <path
                                d="M6.5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.109 0l-.93-.62a1 1 0 0 1-.415-1.074l.4-1.599V7.5zm2 0h-1v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.93-.62-.4-1.598a1 1 0 0 1-.03-.243V7.5z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm5.5-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9v1H8v1h1v1H8v1h1v1H7.5V5h-1V4h1V3h-1V2h1V1z" />
                        </svg>
                    </button>
                    @endif

                    @if($tribute->status == 1)
                    <button wire:click="markAsCompleted"
                        class="flex items-center gap-2 text-white bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>

                        Mark as Completed
                    </button>
                    @endif
                </div>
            </td>
        </tr>
    </table>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const shareButton{{$tribute->id}} = document.querySelector('#shareButton{{$tribute->id}}');
    shareButton{{$tribute->id}}.addEventListener('click', (event) => {
        event.preventDefault();
        navigator.clipboard.writeText(shareButton{{$tribute->id}}.value);
        
        Swal.fire(
            'Copied!',
            'The tribute family link copied!',
            'success'
        )
    });
</script>
@endpush