<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Reviews') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mt-10 mx-auto">
        <!-- Create Review Button -->
        <div class="mb-6">
            <a href="{{ route('user.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Create New Review
            </a>
        </div>

        <!-- Tabs -->
        <div class="mb-6 flex gap-4 border-b border-gray-300">
            <button onclick="switchTab('active')" id="activeTab" class="px-4 py-2 font-semibold text-blue-600 border-b-2 border-blue-600 transition">
                Active Reviews
            </button>
            <button onclick="switchTab('archived')" id="archivedTab" class="px-4 py-2 font-semibold text-gray-600 border-b-2 border-transparent hover:text-blue-600 transition">
                Archived Reviews
            </button>
        </div>

        <!-- Active Reviews Section -->
        <div id="activeSection" class="space-y-6">
            @forelse($reviews as $review)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-500 text-white font-bold text-lg">
                            {{ strtoupper(substr($review->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $review->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                        @if($review->status === 'approved') bg-green-100 text-green-800
                        @elseif($review->status === 'pending') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800
                        @endif
                    ">
                        {{ ucfirst($review->status) }}
                    </span>
                </div>

                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $review->title }}</h3>

                <!-- Content -->
                <p class="text-gray-700 mb-4 leading-relaxed">{!! nl2br(e($review->content)) !!}</p>

                <!-- Images Grid -->
                @if($review->images && $review->images->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                    @foreach($review->images as $image)
                    <img src="{{ asset($image->path) }}" alt="Review Image" class="w-full h-40 object-cover rounded-lg hover:opacity-80 transition cursor-pointer" onclick="openModal('{{ asset($image->path) }}')">
                    @endforeach
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-2 pt-4 border-t">
                    <button onclick="archiveReview({{ $review->id }})" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">
                        Archive
                    </button>
                    <button onclick="deleteReview({{ $review->id }})" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <p class="text-gray-500 text-lg mb-4">No active reviews yet.</p>
                <a href="{{ route('user.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Create Your First Review
                </a>
            </div>
            @endforelse
        </div>

        <!-- Archived Reviews Section -->
        <div id="archivedSection" class="hidden space-y-6">
            @forelse($archivedReviews as $review)
            <div class="bg-gray-50 rounded-lg shadow-md hover:shadow-lg transition p-6 opacity-75">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-400 text-white font-bold text-lg">
                            {{ strtoupper(substr($review->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-700">{{ $review->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-700">
                        Archived
                    </span>
                </div>

                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-700 mb-2">{{ $review->title }}</h3>

                <!-- Content -->
                <p class="text-gray-600 mb-4 leading-relaxed">{!! nl2br(e($review->content)) !!}</p>

                <!-- Images Grid -->
                @if($review->images && $review->images->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                    @foreach($review->images as $image)
                    <img src="{{ asset($image->path) }}" alt="Review Image" class="w-full h-40 object-cover rounded-lg opacity-60 hover:opacity-80 transition cursor-pointer" onclick="openModal('{{ asset($image->path) }}')">
                    @endforeach
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-2 pt-4 border-t border-gray-300">
                    <button onclick="restoreReview({{ $review->id }})" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                        Restore
                    </button>
                    <button onclick="deleteReview({{ $review->id }})" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        Delete Permanently
                    </button>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <p class="text-gray-500 text-lg">No archived reviews.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div class="relative">
            <img id="modalImage" src="" alt="Full Size Image" class="max-w-4xl max-h-96">
            <button onclick="closeModal()" class="absolute top-2 right-2 bg-white text-black rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-200">
                ✕
            </button>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function switchTab(tab) {
            const activeSection = document.getElementById('activeSection');
            const archivedSection = document.getElementById('archivedSection');
            const activeTab = document.getElementById('activeTab');
            const archivedTab = document.getElementById('archivedTab');

            if (tab === 'active') {
                activeSection.classList.remove('hidden');
                archivedSection.classList.add('hidden');
                activeTab.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                activeTab.classList.remove('border-transparent', 'text-gray-600');
                archivedTab.classList.add('border-transparent', 'text-gray-600');
                archivedTab.classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
            } else {
                archivedSection.classList.remove('hidden');
                activeSection.classList.add('hidden');
                archivedTab.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                archivedTab.classList.remove('border-transparent', 'text-gray-600');
                activeTab.classList.add('border-transparent', 'text-gray-600');
                activeTab.classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
            }
        }

        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        function archiveReview(reviewId) {
            Swal.fire({
                title: 'Archive Review?',
                text: "This review will be archived and hidden from view.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#f97316',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, archive it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/user/archive/${reviewId}`;
                    form.innerHTML = `
                        @csrf
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        function restoreReview(reviewId) {
            Swal.fire({
                title: 'Restore Review?',
                text: "This review will be restored to active.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/user/restore/${reviewId}`;
                    form.innerHTML = `
                        @csrf
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        function deleteReview(reviewId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to recover this review!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/user/${reviewId}`;
                    form.innerHTML = `
                        @csrf
                        @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
</x-app-layout>