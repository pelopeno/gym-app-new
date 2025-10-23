<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">User Reviews</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($reviews as $review)
            <div class="bg-white p-6 rounded-lg shadow mb-4">
                <h2 class="text-xl font-semibold">{{ $review->title }}</h2>
                <p class="text-gray-600">{{ $review->content }}</p>
                @if($review->image_path)
                    <img src="{{ asset($review->image_path) }}" alt="Review Image" class="mt-4 w-48 h-48 object-cover rounded">
                @endif
                <p class="text-sm text-gray-400 mt-2">
                    Posted by {{ $review->user->name ?? 'Anonymous' }} on {{ $review->created_at->format('M d, Y') }}
                </p>
            </div>
        @endforeach

        <div class="mt-6 mb-6">
            {{ $reviews->links() }}
        </div>
    </div>
</x-app-layout>
