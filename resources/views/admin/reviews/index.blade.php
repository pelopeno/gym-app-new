@extends('layouts.admin')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Pending User Reviews</h1>

    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">User ID</th>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Content</th>
                    <th class="p-3 text-left">Images</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $review->id }}</td>
                    <td class="p-3">{{ $review->user_id }}</td>
                    <td class="p-3">{{ $review->user->name ?? 'Unknown' }}</td>
                    <td class="p-3">{{ Str::limit($review->title, 40) }}</td>
                    <td class="p-3">{{ Str::limit($review->content, 80) }}</td>

                    <td class="p-3">
                        @if($review->images && $review->images->count() > 0)
                            <div class="image-gallery flex flex-wrap gap-2">
                                @foreach($review->images as $image)
                                    <img src="{{ asset($image->path) }}" 
                                         alt="Review Image"
                                         class="gallery-image w-16 h-16 object-cover rounded border border-gray-200 shadow-sm cursor-pointer">
                                @endforeach
                            </div>
                        @elseif($review->image_path)
                            <div class="image-gallery">
                                <img src="{{ asset($review->image_path) }}" 
                                     alt="Review Image"
                                     class="gallery-image w-16 h-16 object-cover rounded border border-gray-200 shadow-sm cursor-pointer">
                            </div>
                        @else
                            <span class="text-gray-500 italic">No Image</span>
                        @endif
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs
                            @if($review->status == 'approved') bg-green-100 text-green-700 
                            @elseif($review->status == 'rejected') bg-red-100 text-red-700 
                            @else bg-yellow-100 text-yellow-700 @endif">
                            {{ ucfirst($review->status) }}
                        </span>
                    </td>

                    <td class="p-3">{{ $review->created_at->format('Y-m-d') }}</td>

                    <td class="p-3 flex gap-2">
                        @if($review->status == 'pending')
                        <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="confirm-action">
                            @csrf
                            <button type="submit" class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600 transition">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="confirm-action">
                            @csrf
                            <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Reject
                            </button>
                        </form>
                        @else
                        <span class="text-gray-500 text-sm italic">No action</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="p-3 text-center text-gray-500">
                        No reviews found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $reviews->links() }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Approve / Reject confirmation
    document.querySelectorAll('.confirm-action').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let action = form.querySelector('button').innerText.trim();

            Swal.fire({
                title: `Are you sure you want to ${action.toLowerCase()} this review?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: action === 'Approve' ? '#28a745' : '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: `Yes, ${action}`
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
    document.querySelectorAll('.image-gallery').forEach(gallery => {
        let images = Array.from(gallery.querySelectorAll('.gallery-image')).map(img => img.src);

        gallery.querySelectorAll('.gallery-image').forEach((img, index) => {
            img.addEventListener('click', function() {
                showImageModal(images, index);
            });
        });
    });

    function showImageModal(images, startIndex = 0) {
        let currentIndex = startIndex;

        const showImage = (index) => {
            Swal.fire({
                html: `
                    <div class="relative">
                        <img src="${images[index]}" class="mx-auto rounded-lg max-h-[70vh] object-contain">
                        <button id="prev-btn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full w-10 h-10 flex items-center justify-center">&larr;</button>
                        <button id="next-btn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full w-10 h-10 flex items-center justify-center">&rarr;</button>
                    </div>
                    <p class="text-gray-400 mt-2">${index + 1} / ${images.length}</p>
                `,
                showConfirmButton: false,
                background: '#000',
                width: '90%',
                didRender: () => {
                    document.getElementById('prev-btn').addEventListener('click', () => {
                        currentIndex = (currentIndex - 1 + images.length) % images.length;
                        Swal.close();
                        showImage(currentIndex);
                    });
                    document.getElementById('next-btn').addEventListener('click', () => {
                        currentIndex = (currentIndex + 1) % images.length;
                        Swal.close();
                        showImage(currentIndex);
                    });

                }
            });
        };

        showImage(currentIndex);
    }
});
</script>
@endsection
