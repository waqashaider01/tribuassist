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
            <div>
                <div class="hidden md:flex flex-col justify-start gap-1">
                    <div>
                        <div class="font-semibold">
                            {{auth()->user()->first_name}}
                        </div>

                        <button class="flex items-center gap-1 text-gray-600" id="userDropdown"
                            data-dropdown-toggle="dropdownUser">
                            <small>Profile</small>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div id="dropdownUser"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700"
                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(352px, -52px, 0px);"
                    data-popper-placement="top">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 divide-y" aria-labelledby="userDropdown">
                        <li>
                            <a href="{{route('dashboard')}}" class="header-dropdown-link">
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
                            <a href="" class="header-dropdown-link">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 3C0 2.20435 0.316071 1.44129 0.87868 0.87868C1.44129 0.316071 2.20435 0 3 0H4.5C4.76522 0 5.01957 0.105357 5.20711 0.292893C5.39464 0.48043 5.5 0.734784 5.5 1C5.5 1.26522 5.39464 1.51957 5.20711 1.70711C5.01957 1.89464 4.76522 2 4.5 2H3C2.73478 2 2.48043 2.10536 2.29289 2.29289C2.10536 2.48043 2 2.73478 2 3V4.5C2 4.76522 1.89464 5.01957 1.70711 5.20711C1.51957 5.39464 1.26522 5.5 1 5.5C0.734784 5.5 0.48043 5.39464 0.292893 5.20711C0.105357 5.01957 0 4.76522 0 4.5V3ZM14.5 1C14.5 0.734784 14.6054 0.48043 14.7929 0.292893C14.9804 0.105357 15.2348 0 15.5 0H17C17.7956 0 18.5587 0.316071 19.1213 0.87868C19.6839 1.44129 20 2.20435 20 3V4.5C20 4.76522 19.8946 5.01957 19.7071 5.20711C19.5196 5.39464 19.2652 5.5 19 5.5C18.7348 5.5 18.4804 5.39464 18.2929 5.20711C18.1054 5.01957 18 4.76522 18 4.5V3C18 2.73478 17.8946 2.48043 17.7071 2.29289C17.5196 2.10536 17.2652 2 17 2H15.5C15.2348 2 14.9804 1.89464 14.7929 1.70711C14.6054 1.51957 14.5 1.26522 14.5 1ZM1 12.5C1.26522 12.5 1.51957 12.6054 1.70711 12.7929C1.89464 12.9804 2 13.2348 2 13.5V15C2 15.2652 2.10536 15.5196 2.29289 15.7071C2.48043 15.8946 2.73478 16 3 16H4.5C4.76522 16 5.01957 16.1054 5.20711 16.2929C5.39464 16.4804 5.5 16.7348 5.5 17C5.5 17.2652 5.39464 17.5196 5.20711 17.7071C5.01957 17.8946 4.76522 18 4.5 18H3C2.20435 18 1.44129 17.6839 0.87868 17.1213C0.316071 16.5587 0 15.7956 0 15V13.5C0 13.2348 0.105357 12.9804 0.292893 12.7929C0.48043 12.6054 0.734784 12.5 1 12.5ZM19 12.5C19.2652 12.5 19.5196 12.6054 19.7071 12.7929C19.8946 12.9804 20 13.2348 20 13.5V15C20 15.7956 19.6839 16.5587 19.1213 17.1213C18.5587 17.6839 17.7956 18 17 18H15.5C15.2348 18 14.9804 17.8946 14.7929 17.7071C14.6054 17.5196 14.5 17.2652 14.5 17C14.5 16.7348 14.6054 16.4804 14.7929 16.2929C14.9804 16.1054 15.2348 16 15.5 16H17C17.2652 16 17.5196 15.8946 17.7071 15.7071C17.8946 15.5196 18 15.2652 18 15V13.5C18 13.2348 18.1054 12.9804 18.2929 12.7929C18.4804 12.6054 18.7348 12.5 19 12.5ZM4 3.75C4.26522 3.75 4.51957 3.85536 4.70711 4.04289C4.89464 4.23043 5 4.48478 5 4.75V13.25C5 13.5152 4.89464 13.7696 4.70711 13.9571C4.51957 14.1446 4.26522 14.25 4 14.25C3.73478 14.25 3.48043 14.1446 3.29289 13.9571C3.10536 13.7696 3 13.5152 3 13.25V4.75C3 4.48478 3.10536 4.23043 3.29289 4.04289C3.48043 3.85536 3.73478 3.75 4 3.75ZM9 4.75C9 4.48478 8.89464 4.23043 8.70711 4.04289C8.51957 3.85536 8.26522 3.75 8 3.75C7.73478 3.75 7.48043 3.85536 7.29289 4.04289C7.10536 4.23043 7 4.48478 7 4.75V13.25C7 13.5152 7.10536 13.7696 7.29289 13.9571C7.48043 14.1446 7.73478 14.25 8 14.25C8.26522 14.25 8.51957 14.1446 8.70711 13.9571C8.89464 13.7696 9 13.5152 9 13.25V4.75ZM12 3.75C12.2652 3.75 12.5196 3.85536 12.7071 4.04289C12.8946 4.23043 13 4.48478 13 4.75V13.25C13 13.5152 12.8946 13.7696 12.7071 13.9571C12.5196 14.1446 12.2652 14.25 12 14.25C11.7348 14.25 11.4804 14.1446 11.2929 13.9571C11.1054 13.7696 11 13.5152 11 13.25V4.75C11 4.48478 11.1054 4.23043 11.2929 4.04289C11.4804 3.85536 11.7348 3.75 12 3.75ZM17 4.75C17 4.48478 16.8946 4.23043 16.7071 4.04289C16.5196 3.85536 16.2652 3.75 16 3.75C15.7348 3.75 15.4804 3.85536 15.2929 4.04289C15.1054 4.23043 15 4.48478 15 4.75V13.25C15 13.5152 15.1054 13.7696 15.2929 13.9571C15.4804 14.1446 15.7348 14.25 16 14.25C16.2652 14.25 16.5196 14.1446 16.7071 13.9571C16.8946 13.7696 17 13.5152 17 13.25V4.75Z"
                                        fill="currentColor" />
                                </svg>
                                Barcodes
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
                            <a href="" class="header-dropdown-link">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.1 7.22C16.29 7.22 15.55 5.94 16.45 4.37C16.97 3.46 16.66 2.3 15.75 1.78L14.02 0.789997C13.23 0.319997 12.21 0.599998 11.74 1.39L11.63 1.58C10.73 3.15 9.25 3.15 8.34 1.58L8.23 1.39C7.78 0.599998 6.76 0.319997 5.97 0.789997L4.24 1.78C3.33 2.3 3.02 3.47 3.54 4.38C4.45 5.94 3.71 7.22 1.9 7.22C0.86 7.22 0 8.07 0 9.12V10.88C0 11.92 0.85 12.78 1.9 12.78C3.71 12.78 4.45 14.06 3.54 15.63C3.02 16.54 3.33 17.7 4.24 18.22L5.97 19.21C6.76 19.68 7.78 19.4 8.25 18.61L8.36 18.42C9.26 16.85 10.74 16.85 11.65 18.42L11.76 18.61C12.23 19.4 13.25 19.68 14.04 19.21L15.77 18.22C16.68 17.7 16.99 16.53 16.47 15.63C15.56 14.06 16.3 12.78 18.11 12.78C19.15 12.78 20.01 11.93 20.01 10.88V9.12C20 8.08 19.15 7.22 18.1 7.22ZM10 13.25C8.21 13.25 6.75 11.79 6.75 10C6.75 8.21 8.21 6.75 10 6.75C11.79 6.75 13.25 8.21 13.25 10C13.25 11.79 11.79 13.25 10 13.25Z"
                                        fill="currentColor" />
                                </svg>
                                Settings
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
        </div>
    </div>
</div>