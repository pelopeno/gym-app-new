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

                    <div class="space-y-4">
                        @forelse($announcements as $a)
                        <div class="flex items-start p-4 bg-white rounded-lg shadow hover:shadow-md transition">
                            {{-- Circle with first letter --}}
                            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-blue-500 text-white font-bold">
                                {{ strtoupper(substr($a->title, 0, 1)) }}
                            </div>

                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">{{ $a->title }}</p>
                                <p class="text-sm text-gray-600 mb-2">{!! $a->content !!}</p>
                                <span class="text-xs text-gray-500 italic">
                                    Posted on {{ $a->created_at->format('M d, Y') }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-sm">No announcements available.</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $announcements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>