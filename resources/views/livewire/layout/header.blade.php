<div class="sticky top-0 flex justify-between items-center px-6 py-4 bg-blue-900 md:bg-white border-b">

    <div class="md:hidden">
        <a href="/">
            @livewire('components.logo')
        </a>
    </div>

    <div class="hidden md:flex flex-col gap-2">
        <h1 class="text-2xl leading-none font-semibold">@yield('page_name')</h1>
        <p class="text-sm leading-none text-gray-400 font-light">{{now()->format('D d M, Y')}}</p>
    </div>

    <div class="flex items-center gap-2">

        {{-- Notification --}}
        {{-- <button id="notificationDropdown" data-dropdown-toggle="dropdownNotification"
            class="h-12 w-12 hidden md:flex justify-center items-center border rounded-xl bg-stone-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell"
                viewBox="0 0 16 16">
                <path
                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
            </svg>
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg> -->
        </button>

        <div id="dropdownNotification"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(352px, -52px, 0px);"
            data-popper-placement="top">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="notificationDropdown">
                <li>
                    <a href="#"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                        Notification 1
                    </a>
                </li>
                <li>
                    <button class="header-dropdown-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                        Notification 2
                    </button>
                </li>
            </ul>
        </div> --}}

        {{-- User --}}
        <div class="flex items-center gap-2">
            <div class="hidden md:flex flex-col justify-start gap-1">
                <div>
                    <div class="font-semibold">{{auth()->user()->first_name}}</div>

                    <button class="flex items-center gap-1 text-gray-600" id="userDropdown"
                        data-dropdown-toggle="dropdownUser">
                        <small>Profile</small>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                @if($profileCompleted < 100) <a href="{{route('profile.show')}}"
                    class="w-full bg-gray-200 rounded-full dark:bg-gray-700"
                    title="Profile completed {{round($profileCompleted)}}%">
                    <div class="button flex justify-center items-center font-light text-center p-0.5 leading-none rounded-full"
                        style="font-size: 11px; width: {{$profileCompleted}}%"> {{round($profileCompleted)}}%</div>
                    </a>
                    @endif
            </div>

            <div id="dropdownUser"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(352px, -52px, 0px);"
                data-popper-placement="top">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 divide-y" aria-labelledby="userDropdown">
                    <li>
                        <a href="{{route('welcome')}}" class="header-dropdown-link">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 10H7C7.55 10 8 9.55 8 9V1C8 0.45 7.55 0 7 0H1C0.45 0 0 0.45 0 1V9C0 9.55 0.45 10 1 10ZM1 18H7C7.55 18 8 17.55 8 17V13C8 12.45 7.55 12 7 12H1C0.45 12 0 12.45 0 13V17C0 17.55 0.45 18 1 18ZM11 18H17C17.55 18 18 17.55 18 17V9C18 8.45 17.55 8 17 8H11C10.45 8 10 8.45 10 9V17C10 17.55 10.45 18 11 18ZM10 1V5C10 5.55 10.45 6 11 6H17C17.55 6 18 5.55 18 5V1C18 0.45 17.55 0 17 0H11C10.45 0 10 0.45 10 1Z"
                                    fill="currentColor" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{route('profile.show')}}"
                            class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z"
                                    fill="currentColor" />
                                <path
                                    d="M17.08 14.15C14.29 12.29 9.74 12.29 6.93 14.15C5.66 15 4.96 16.15 4.96 17.38C4.96 18.61 5.66 19.75 6.92 20.59C8.32 21.53 10.16 22 12 22C13.84 22 15.68 21.53 17.08 20.59C18.34 19.74 19.04 18.6 19.04 17.36C19.03 16.13 18.34 14.99 17.08 14.15Z"
                                    fill="currentColor" />
                            </svg>
                            Profile
                        </a>
                    </li>

                    <li>
                        <button class="header-dropdown-link" onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        ">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 4L7.6 5.4L10.2 8H0V10H10.2L7.6 12.6L9 14L14 9L9 4ZM18 16H10V18H18C19.1 18 20 17.1 20 16V2C20 0.9 19.1 0 18 0H10V2H18V16Z"
                                    fill="currentColor" />
                            </svg>
                            Logout
                        </button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Offscreen Menu --}}
        {{-- <button id="sidebarToggler"
            class="h-12 w-12 flex md:hidden justify-center items-center border rounded-xl bg-blue-900 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button> --}}
    </div>

</div>