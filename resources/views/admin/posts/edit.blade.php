@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Post</h1>

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


        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" class="space-y-6 confirm-update" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text"
                    name="title"
                    value="{{ $post->title }}"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content"
                    rows="6"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $post->content }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" required
                    class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image (Optional)</label>
                <img src="{{ asset($post->image_path) }}" alt="Current Image" class="mb-4 w-48 h-48 object-cover rounded-lg border border-gray-300 shadow-sm">
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

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const saveForm = document.querySelector(".confirm-update");
        const imageInput = document.getElementById("imageInput");
        const previewImage = document.getElementById("previewImage");

        if (saveForm) {
            saveForm.addEventListener("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Update this post?",
                    text: "Make sure everything looks good before update.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#16a34a",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, update it!"
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