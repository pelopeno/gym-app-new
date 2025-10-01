<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
                        📢 Latest Announcements
                    </h3>

                    <div class="mb-6">
                        <form method="GET" action="{{ route('dashboard') }}" class="flex items-center gap-3">
                            <label for="category" class="text-sm font-medium text-gray-700">
                                Filter by Category:
                            </label>
                            <select name="category" id="category"
                                class="border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- All Categories --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                Apply
                            </button>
                        </form>
                    </div>

                    <div class="space-y-4">
                        @forelse($announcements as $a)
                        <div class="flex items-start p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                                {{ strtoupper(substr($a->user->name, 0, 1)) }}
                            </div>

                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">
                                    {{ $a->title }}
                                </p>
                                <p class="text-sm text-gray-600 mb-2">{!! $a->content !!}</p>
                                <span class="text-xs text-gray-500 italic">
                                    Posted on {{ $a->created_at->format('M d, Y') }} by {{ $a->user->name }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-sm">No announcements available.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $announcements->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
