@extends('layouts.public')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="font-benguiat text-5xl font-bold mb-4">We Got It All!</h1>
        <p class="font-epundaslab text-lg text-gray-700 mb-6">
            From flexible schedules to complete fitness support, discover everything you need in one place.
        </p>
        <a href="{{ route('guest.join') }}" 
           class="font-epundaslab bg-secondary text-white px-6 py-3 rounded hover:text-black transition duration-300">
            Join Now
        </a>
    </div>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 text-center">
        <div class="p-6 bg-gray-900 text-white rounded-lg shadow hover:shadow-xl transition">
            <h3 class="font-epundaslab text-2xl font-semibold mb-4">CrossFit Schedule</h3>
            <div class="text-left text-sm space-y-2">
                <p><span class="font-bold">Mon – Fri:</span> 6:00 AM – 7:00 AM (Morning WOD)</p>
                <p><span class="font-bold">Mon – Fri:</span> 6:00 PM – 7:00 PM (Evening WOD)</p>
                <p><span class="font-bold">Sat:</span> 9:00 AM – 10:30 AM (Partner Workout)</p>
                <p><span class="font-bold">Sun:</span> Rest / Recovery Sessions</p>
            </div>
            <div class="mt-4">
                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-500 text-black">
                    High Intensity
                </span>
            </div>
        </div>

        <div class="p-6 bg-gray-900 text-white rounded-lg shadow hover:shadow-xl transition">
            <h3 class="font-epundaslab text-2xl font-semibold mb-4">Muay Thai Schedule</h3>
            <div class="text-left text-sm space-y-2">
                <p><span class="font-bold">Mon / Wed / Fri:</span> 7:00 AM – 8:30 AM (Beginner)</p>
                <p><span class="font-bold">Tue / Thu:</span> 6:00 PM – 7:30 PM (Intermediate)</p>
                <p><span class="font-bold">Sat:</span> 10:00 AM – 12:00 PM (Advanced)</p>
                <p><span class="font-bold">Sun:</span> Open Sparring – 4:00 PM</p>
            </div>
            <div class="mt-4">
                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-500 text-black">
                    New Members Welcome
                </span>
            </div>
        </div>

        <div class="p-6 bg-gray-900 text-white rounded-lg shadow hover:shadow-xl transition">
            <h3 class="font-epundaslab text-2xl font-semibold mb-4">Jiu-Jitsu Schedule</h3>
            <div class="text-left text-sm space-y-2">
                <p><span class="font-bold">Mon / Wed:</span> 6:00 PM – 7:30 PM (Gi)</p>
                <p><span class="font-bold">Tue / Thu:</span> 7:00 AM – 8:30 AM (No-Gi)</p>
                <p><span class="font-bold">Fri:</span> 6:00 PM – 8:00 PM (Mixed Levels)</p>
                <p><span class="font-bold">Sat:</span> 1:00 PM – 3:00 PM (Open Mat)</p>
            </div>
            <div class="mt-4">
                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-500 text-black">
                    Gi & No-Gi Sessions
                </span>
            </div>
        </div>
    </div>
</section>
@endsection
