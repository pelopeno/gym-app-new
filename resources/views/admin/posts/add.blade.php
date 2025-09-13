@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <span class="text-green-600">➕</span> Add New Post
        </h1>

        <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-6">
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

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.posts.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                    Save Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
