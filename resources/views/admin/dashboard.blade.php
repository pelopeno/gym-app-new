@extends('layouts.admin')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">📊 Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500 text-sm">Total Posts</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $postCount }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500 text-sm">Total Users</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $userCount }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Activity</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-600 text-sm">
                    <th class="p-3">User</th>
                    <th class="p-3">Action</th>
                    <th class="p-3">Module</th>
                    <th class="p-3">Details</th>
                    <th class="p-3">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $activity)
                <tr class="border-b {{ $loop->even ? 'bg-gray-50' : '' }}">
                    <td class="p-3">{{ $activity->user->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $activity->action }}</td>
                    <td class="p-3">{{ $activity->module }}</td>
                    <td class="p-3">
                        @if(is_array($activity->details))
                        @foreach($activity->details as $key => $value)
                        <strong>{{ ucfirst($key) }}:</strong> {{ $value }}<br>
                        @endforeach
                        @else
                        {{ $activity->details }}
                        @endif
                    </td>
                    <td class="p-3">{{ $activity->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $logs->links() }}
    </div>
    @endsection