@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">✏️ Edit Post</h1>

        <form method="POST" action="{{ url('/admin/posts/' . $post->id) }}" class="space-y-6">
            @csrf
            @method('PATCH')
            
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

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
