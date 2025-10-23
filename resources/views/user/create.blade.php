<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Share Your Thoughts') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mt-10 mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-benguiat mb-6 text-gray-800">Submit Your Review</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Something went wrong:</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Review Form --}}
        <form method="POST" action="{{ route('user.store') }}" class="confirm-add" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 text-lg font-semibold text-gray-700">Title</label>
                <input type="text"
                    name="title"
                    placeholder="e.g. My Gym Experience"
                    value="{{ old('title') }}"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:outline-none">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-lg font-semibold text-gray-700">Content</label>
                <textarea rows="5"
                    name="content"
                    placeholder="Write your thoughts here..."
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:outline-none">{{ old('content') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-lg font-semibold text-gray-700">Images (Optional, up to 3)</label>
                <input type="file"
                    id="imageInput"
                    name="images[]"
                    multiple
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:outline-none">

                <p class="text-sm text-gray-500 mt-1">You can upload up to 3 images.</p>

                <div id="previewContainer" class="mt-4 flex flex-wrap gap-3"></div>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-secondary text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-black transition ease-in-out duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const saveForm = document.querySelector(".confirm-add");
            const imageInput = document.getElementById("imageInput");
            const previewContainer = document.getElementById("previewContainer");

            imageInput.addEventListener("change", function(e) {
                const files = Array.from(e.target.files);

                if (files.length > 3) {
                    Swal.fire({
                        icon: "error",
                        title: "Too many images",
                        text: "You can only upload up to 3 images.",
                    });
                    imageInput.value = "";
                    previewContainer.innerHTML = "";
                    return;
                }

                previewContainer.innerHTML = "";

                files.forEach((file, index) => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const wrapper = document.createElement("div");
                        wrapper.classList.add("relative");

                        const img = document.createElement("img");
                        img.src = event.target.result;
                        img.classList.add(
                            "w-32", "h-32", "object-cover",
                            "rounded-lg", "border", "border-gray-300", "shadow-sm"
                        );

                        const removeBtn = document.createElement("button");
                        removeBtn.innerHTML = "&times;";
                        removeBtn.classList.add(
                            "absolute", "top-1", "right-2", "bg-black", "bg-opacity-60",
                            "text-white", "rounded-full", "w-6", "h-6", "flex",
                            "items-center", "justify-center", "hover:bg-red-600"
                        );
                        removeBtn.addEventListener("click", function(ev) {
                            ev.preventDefault();
                            wrapper.remove();

                            // Rebuild file list
                            const remainingFiles = Array.from(previewContainer.querySelectorAll("img")).map(imgEl => imgEl.src);
                            if (remainingFiles.length === 0) {
                                imageInput.value = "";
                            }
                        });

                        wrapper.appendChild(img);
                        wrapper.appendChild(removeBtn);
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });
            });

            if (saveForm) {
                saveForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Add this review?",
                        text: "Make sure everything looks good before submitting.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#16a34a",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, submit it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            saveForm.submit();
                        }
                    });
                });
            }
        });
    </script>
</x-app-layout>
