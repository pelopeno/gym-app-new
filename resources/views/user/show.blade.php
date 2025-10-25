<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">User Reviews</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($reviews as $review)
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h2 class="text-xl font-semibold">{{ $review->title }}</h2>
                <p class="text-gray-600">{{ $review->content }}</p>

                @if($review->images && count($review->images) > 0)
                    <div class="relative mt-4 w-full max-w-md mx-auto">
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset($review->images[0]->path) }}"
                                 alt="Review Image"
                                 class="carousel-image w-full h-64 object-cover rounded transition duration-500">
                        </div>

                        @if(count($review->images) > 1)
                            <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-70 text-white px-3 py-1 rounded-full hover:bg-black transition carousel-prev">
                                &#10094;
                            </button>
                            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-70 text-white px-3 py-1 rounded-full hover:bg-black transition carousel-next">
                                &#10095;
                            </button>
                        @endif
                    </div>

                    <div class="hidden">
                        @foreach($review->images as $img)
                            <img src="{{ asset($img->path) }}" alt="Hidden Review Image">
                        @endforeach
                    </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".bg-white").forEach((card) => {
                const images = Array.from(card.querySelectorAll(".hidden img"));
                const imgDisplay = card.querySelector(".carousel-image");
                const prevBtn = card.querySelector(".carousel-prev");
                const nextBtn = card.querySelector(".carousel-next");

                if (!images.length || !imgDisplay) return;
                let index = 0;

                const updateImage = () => {
                    imgDisplay.src = images[index].src;
                };

                nextBtn?.addEventListener("click", () => {
                    index = (index + 1) % images.length;
                    updateImage();
                });

                prevBtn?.addEventListener("click", () => {
                    index = (index - 1 + images.length) % images.length;
                    updateImage();
                });
            });
        });
    </script>
</x-app-layout>
