<nav class="p-4 bg-gray-800 flex items-center justify-between shadow-lg">

    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
        </a>
        <span class="font-benguiat text-2xl font-bold text-white">
            Admin Panel
        </span>
    </div>

    <div class="flex items-center space-x-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="text-gray-300 hover:text-yellow-400 font-medium transition">
            Dashboard
        </a>
        <a href="{{ route('admin.posts.index') }}" 
           class="text-gray-300 hover:text-yellow-400 font-medium transition">
            Posts
        </a>
        <a href="{{ route('admin.posts.add') }}" 
           class="text-gray-300 hover:text-yellow-400 font-medium transition">
            Add Post
        </a>
        <a href="{{ route('admin.reviews.index') }}" 
           class="text-gray-300 hover:text-yellow-400 font-medium transition">
            User Reviews
        </a>
    </div>

    <div class="flex items-center space-x-4">
        <span class="text-gray-400 text-sm">
            Hi, <strong class="text-white">{{ Auth::user()->name }}</strong>
        </span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                Logout
            </button>
        </form>
    </div>
</nav>
