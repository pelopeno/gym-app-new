@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <span class="text-green-600">➕</span> Add New Post
        </h1>

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

        <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-6 confirm-save" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text"
                    name="title"
                    placeholder="Enter post title"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content"
                    rows="6"
                    placeholder="Write your post here..."
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
 
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image (Optional)</label>
                    <input type="file"
                        id="imageInput"
                        name="image"
                        accept="image/*"
                        class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Preview Image</label>
                <img id="previewImage"
                    src="#"
                    alt="Preview"
                    class="hidden w-48 h-48 object-cover rounded-lg border border-gray-300 shadow-sm">
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.posts.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                    Add Post
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const saveForm = document.querySelector(".confirm-save");
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById("previewImage");

        if (saveForm) {
            saveForm.addEventListener("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Add this post?",
                    text: "Make sure everything looks good before posting.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#16a34a",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, save it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        saveForm.submit();
                    }
                });
            });
        }

        imageInput.addEventListener("change", function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    previewImage.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.classList.add("hidden");
            }
        });
        
    });
</script>
@endsection