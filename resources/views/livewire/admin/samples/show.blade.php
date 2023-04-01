@section('page_name', 'Funeral Home')

<div class="bg-white p-8 space-y-8">
    <table class="w-full border">
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Funeral Home Id</th>
            <td>{{$funeral_home->id}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Name</th>
            <td>{{$funeral_home->name}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Total Tributes</th>
            <td>{{$funeral_home->tributes->count()}}</td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Subscription Status</th>
            <td>
                <div class="">
                    {{$funeral_home->subscription_status() ? "Active" : "Inactive"}}
                    @if($funeral_home->inGracePeriod())
                    (In Grace)
                    @endif
                </div>
            </td>
        </tr>

        @if($funeral_home->subscription_status())
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Valid Till</th>
            <td>{{$funeral_home->subscription?->valid_till->format('d M, Y')}}</td>
        </tr>
        @endif

        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Onwer Name</th>
            <td>
                <a href="{{route('users.show', $funeral_home->user_id)}}">
                    {{$funeral_home->owner->first_name . ' ' . $funeral_home->owner->last_name}}
                </a>
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-stone-100 divide-x divide-stone-100">
            <th>Actions</th>
            <td>
                <div class="flex items-center gap-2">
                    <a href="{{route('funeral_homes.edit', $funeral_home->id)}}"
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