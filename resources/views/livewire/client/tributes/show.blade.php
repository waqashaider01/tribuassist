@section('page_name', 'Tribute: Details')

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
                    <button id="shareButton{{$tribute->id}}" value="{{route('ui.slideshow.edit', $tribute->id)}}"
                        class="text-blue-900 bg-stone-100 hover:text-white hover:bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                        </svg>
                    </button>

                    <a href="{{route('tributes.edit', $tribute->id)}}"
                        class="text-blue-900 bg-stone-100 hover:text-white hover:bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
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