@extends('layouts.admin')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">📑 Posts</h1>

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
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Content</th>
                    <th class="p-3 text-left">Author</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $post->id }}</td>
                    <td class="p-3">{{ $post->title }}</td>
                    <td class="p-3">{{ Str::limit($post->content, 50) }}</td>
                    <td class="p-3">{{ $post->user->name ?? 'Unknown' }}</td>
                    <td class="p-3">{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                            class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{route('admin.posts.delete',  $post->id)}}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this Announcement?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Delete
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-3 text-center text-gray-500">
                        No posts found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection