@extends('layouts.admin')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Posts</h1>

    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    {{-- Active posts --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow mb-8">
        <h2 class="text-xl font-semibold p-4 border-b">Active Announcements</h2>
        <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Content</th>
                    <th class="p-3 text-left">Image</th>
                    <th class="p-3 text-left">Category</th>
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
                    <td class="p-3">
                        @if($post->image_path)
                        <img src="{{ asset($post->image_path) }}" alt="Post Image" class="w-16 h-16 object-cover rounded">
                        @else
                        <span class="text-gray-500 italic">No Image</span>
                        @endif
                    </td>
                    <td class="p-3">{{ Str::limit($post->content, 50) }}</td>
                    <td class="p-3">{{ $post->category->name ?? 'Uncategorized' }}</td>
                    <td class="p-3">{{ $post->user->name ?? 'Unknown' }}</td>
                    <td class="p-3">{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                            class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST"
                            class="swal-confirm" data-action="archive">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Archive
                            </button>
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
        <div class="p-4">
            {{ $posts->links() }}
        </div>
    </div>

    {{-- Archived posts --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <h2 class="text-xl font-semibold p-4 border-b">Archived Announcements</h2>
        <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Content</th>
                    <th class="p-3 text-left">Image</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Author</th>
                    <th class="p-3 text-left">Deleted At</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trashed as $post)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $post->id }}</td>
                    <td class="p-3">{{ $post->title }}</td>
                    <td class="p-3">{{ Str::limit($post->content, 50) }}</td>
                    <td class="p-3">
                        @if($post->image_path)
                        <img src="{{ asset($post->image_path) }}" alt="Post Image" class="w-16 h-16 object-cover rounded">
                        @else
                        <span class="text-gray-500 italic">No Image</span>
                        @endif
                    <td class="p-3">{{ $post->category->name ?? 'Uncategorized' }}</td>
                    <td class="p-3">{{ $post->user->name ?? 'Unknown' }}</td>
                    <td class="p-3">{{ $post->deleted_at->format('Y-m-d') }}</td>
                    <td class="p-3 flex gap-2">
                        <form action="{{ route('admin.announce.restore', $post->id) }}" method="POST"
                            class="swal-confirm" data-action="restore">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600 transition">
                                Restore
                            </button>
                        </form>
                        <form action="{{ route('admin.announce.force-delete', $post->id) }}" method="POST"
                            class="swal-confirm" data-action="delete permanently">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 text-sm bg-red-700 text-white rounded hover:bg-red-800 transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-3 text-center text-gray-500">
                        No archived announcements.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $trashed->links() }}
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.swal-confirm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let action = form.dataset.action;

                Swal.fire({
                    title: `Are you sure you want to ${action} this announcement?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: `Yes, ${action}`
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection