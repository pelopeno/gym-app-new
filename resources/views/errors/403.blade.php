@extends('layouts.error')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-6xl font-bold text-red-600">403</h1>
    <p class="text-xl mt-4">You don’t have permission to access this page.</p>
    <a href="{{ route('homepage') }}" class="mt-6 px-4 py-2 bg-primary text-white rounded-lg">Go Back Home</a>
</div>
@endsection
