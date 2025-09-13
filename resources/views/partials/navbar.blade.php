<nav class="p-6 bg-primary flex items-center justify-between">

    <div class="">
        <a href="{{ route('homepage') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-15 inline-block mr-2">
        </a>
        <a href="{{ route('homepage') }}" class="font-benguiat text-3xl font-bold text-white">
            Anytime Witness
        </a>
    </div>

    <div class="flex items-center space-x-4">
        <a href="{{ route('homepage') }}" class="font-epundaslab text-white text-xl font-bold hover:text-black">Homepage</a>
        <a href="{{ route('guest.about') }}" class="font-epundaslab text-white text-xl font-bold hover:text-black">About Us</a>
        <a href="{{ route('guest.join') }}" class="font-epundaslab text-white text-xl font-bold hover:text-black">Why Join</a>
        <a href="{{ route('guest.plans') }}" class="font-epundaslab text-white text-xl font-bold hover:text-black">Plans</a>
        <a href="{{ route('guest.classes') }}" class="font-epundaslab text-white text-xl font-bold hover:text-black">Classes</a>

    </div>
@auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" 
           class="font-epundaslab text-white font-bold hover:text-blue-400">
           Back to Admin Dashboard
        </a>
    @else
        <a href="{{ route('dashboard') }}" 
           class="font-epundaslab text-white font-bold hover:text-blue-400">
           Back to Dashboard
        </a>
    @endif

    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" 
            class="font-epundaslab text-l font-bold text-white hover:text-black border border-white rounded-lg px-3 py-2 shadow-sm hover:bg-gray-50 transition duration-200 ease-in-out">
            Logout
        </button>
    </form>
@else
    <div class="flex items-center space-x-4">
        <a href="{{ route('login') }}" 
           class="font-epundaslab text-l font-bold text-white hover:text-black bg-secondary border border-secondary rounded-lg px-3 py-2 shadow-sm hover:bg-gray-50 transition duration-200 ease-in-out">
           LOGIN
        </a>
        <a href="{{ route('register') }}" 
           class="font-epundaslab text-l font-bold text-white hover:text-black bg-secondary border border-secondary rounded-lg px-3 py-2 shadow-sm hover:bg-gray-50 transition duration-200 ease-in-out">
           REGISTER
        </a>
    </div>
@endauth

</nav>