<tr class="">
    <td class="uppercase">
        <a href="{{route('clients.edit', $client->id)}}">{{$client->name}}</a>
    </td>
    <td>{{$client->active_state ? "Active" : "Inactive"}}</td>
    <td>{{$client->created_at->format('d M, Y')}}</td>
    <td>
        <button id="dropdownSerial" data-dropdown-toggle="dropdownSerial{{$client->id}}"
            class="text-blue-900 bg-stone-100 hover:text-white hover:bg-blue-900 focus:bg-blue-900 focus:text-white focus:ring-4 focus:outline-none rounded-lg p-2.5"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
        </button>

        <div id="dropdownSerial{{$client->id}}"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(352px, -52px, 0px);"
            data-popper-placement="top">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSerial">
                <li>
                    <a href="{{route('categories.edit', $client->id)}}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye" viewBox="0 0 16 16">
                            <path
                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path
                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                        Edit
                    </a>
                </li>
            </ul>
        </div>
    </td>
</tr>