<a class="flex gap-2 items-center text-white" href="/">
    {{-- <div class="h-12 w-12 rounded-full overflow-hidden">
        <img class="h-full w-full" src="{{asset('images/logo.png')}}" alt="Logo">
    </div> --}}
    <div class="">
        <strong class="block text-2xl uppercase">TribuAssist</strong>
        <small class="text-white/60">
            @if(auth()->user()->role === 1)
            Admin
            @elseif(auth()->user()->role === 2)
            Funeral Home
            @else
            Customer
            @endif
        </small>
    </div>
</a>