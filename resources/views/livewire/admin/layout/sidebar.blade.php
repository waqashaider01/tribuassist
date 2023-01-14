<div id="sidebarOffscreenOverlay" class="hidden fixed inset-0 z-10 bg-black/50"></div>
<aside id="sidebar" class="sidebar">
    <div class="flex-shrink-0 border-b border-white/40 py-6 px-8">
        <a href="/">
            @livewire('components.logo')
        </a>
    </div>

    <nav class="h-full overflow-y-auto space-y-3 py-8 px-8">
        <a href="/" class="{{isActiveRoute('dashboard') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 10H7C7.55 10 8 9.55 8 9V1C8 0.45 7.55 0 7 0H1C0.45 0 0 0.45 0 1V9C0 9.55 0.45 10 1 10ZM1 18H7C7.55 18 8 17.55 8 17V13C8 12.45 7.55 12 7 12H1C0.45 12 0 12.45 0 13V17C0 17.55 0.45 18 1 18ZM11 18H17C17.55 18 18 17.55 18 17V9C18 8.45 17.55 8 17 8H11C10.45 8 10 8.45 10 9V17C10 17.55 10.45 18 11 18ZM10 1V5C10 5.55 10.45 6 11 6H17C17.55 6 18 5.55 18 5V1C18 0.45 17.55 0 17 0H11C10.45 0 10 0.45 10 1Z"
                    fill="currentColor" />
            </svg>
            {{__('Dashboard')}}
        </a>

        <a href="{{route('orders')}}" class="{{isActiveRoute('orders') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
            </svg>
            {{__('Orders')}}
        </a>

        <a href="{{route('clients')}}" class="{{isActiveRoute('clients') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg>
            {{__('Funeral Homes')}}
        </a>

        <a href="{{route('users')}}" class="{{isActiveRoute('users') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            {{__('Users')}}
        </a>

        <a href="{{route('samples')}}" class="{{isActiveRoute('samples') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            {{__('Samples')}}
        </a>

        <a href="{{route('configurations')}}"
            class="{{isActiveRoute('configurations') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.1 7.22C16.29 7.22 15.55 5.94 16.45 4.37C16.97 3.46 16.66 2.3 15.75 1.78L14.02 0.789997C13.23 0.319997 12.21 0.599998 11.74 1.39L11.63 1.58C10.73 3.15 9.25 3.15 8.34 1.58L8.23 1.39C7.78 0.599998 6.76 0.319997 5.97 0.789997L4.24 1.78C3.33 2.3 3.02 3.47 3.54 4.38C4.45 5.94 3.71 7.22 1.9 7.22C0.86 7.22 0 8.07 0 9.12V10.88C0 11.92 0.85 12.78 1.9 12.78C3.71 12.78 4.45 14.06 3.54 15.63C3.02 16.54 3.33 17.7 4.24 18.22L5.97 19.21C6.76 19.68 7.78 19.4 8.25 18.61L8.36 18.42C9.26 16.85 10.74 16.85 11.65 18.42L11.76 18.61C12.23 19.4 13.25 19.68 14.04 19.21L15.77 18.22C16.68 17.7 16.99 16.53 16.47 15.63C15.56 14.06 16.3 12.78 18.11 12.78C19.15 12.78 20.01 11.93 20.01 10.88V9.12C20 8.08 19.15 7.22 18.1 7.22ZM10 13.25C8.21 13.25 6.75 11.79 6.75 10C6.75 8.21 8.21 6.75 10 6.75C11.79 6.75 13.25 8.21 13.25 10C13.25 11.79 11.79 13.25 10 13.25Z"
                    fill="currentColor" />
            </svg>
            {{__('Configurations')}}
        </a>

        <a href="{{route('profile.show')}}"
            class="{{isActiveRoute('profile.show') ? 'sidebar-link-active' : 'sidebar-link' }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z"
                    fill="currentColor" />
                <path
                    d="M17.08 14.15C14.29 12.29 9.74 12.29 6.93 14.15C5.66 15 4.96 16.15 4.96 17.38C4.96 18.61 5.66 19.75 6.92 20.59C8.32 21.53 10.16 22 12 22C13.84 22 15.68 21.53 17.08 20.59C18.34 19.74 19.04 18.6 19.04 17.36C19.03 16.13 18.34 14.99 17.08 14.15Z"
                    fill="currentColor" />
            </svg>
            {{__('Profile')}}
        </a>
    </nav>

    <div class="py-8 px-10">
        <button class="sidebar-link w-full" onclick="
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                ">
            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9 4L7.6 5.4L10.2 8H0V10H10.2L7.6 12.6L9 14L14 9L9 4ZM18 16H10V18H18C19.1 18 20 17.1 20 16V2C20 0.9 19.1 0 18 0H10V2H18V16Z"
                    fill="currentColor" />
            </svg>
            Logout
        </button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</aside>