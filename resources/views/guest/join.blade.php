@extends('layouts.public')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="font-benguiat text-5xl font-bold text-gray-900 mb-4">Why Join Anytime Witness?</h1>
        <p class="font-epundaslab text-lg text-gray-600">
            More than a gym — a community dedicated to your growth.
        </p>
    </div>

    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 text-center">
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-primary text-5xl mb-4">
                <i class="fas fa-dumbbell"></i>
            </div>
            <h3 class="font-epundaslab text-xl font-bold mb-2">State-of-the-Art Equipment</h3>
            <p class="text-gray-600">
                Access the latest machines and free weights to maximize your workouts.
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-primary text-5xl mb-4">
                <i class="fas fa-user-friends"></i>
            </div>
            <h3 class="font-epundaslab text-xl font-bold mb-2">Expert Trainers</h3>
            <p class="text-gray-600">
                Get personalized coaching and support from certified professionals.
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-primary text-5xl mb-4">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h3 class="font-epundaslab text-xl font-bold mb-2">Flexible Plans</h3>
            <p class="text-gray-600">
                Choose a membership that fits your lifestyle, with no hidden fees.
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-primary text-5xl mb-4">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h3 class="font-epundaslab text-xl font-bold mb-2">Holistic Wellness</h3>
            <p class="text-gray-600">
                We focus on fitness, nutrition, and mental health to keep you balanced.
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-primary text-5xl mb-4">
                <i class="fas fa-users"></i>
            </div>
            <h3 class="font-epundaslab text-xl font-bold mb-2">Supportive Community</h3>
            <p class="text-gray-600">
                Surround yourself with people who motivate and inspire you daily.
            </p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col items-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-primary text-white text-3xl mb-4 shadow">
                <i class="fas fa-map-marker-alt"></i>
            </div>

            <h3 class="font-epundaslab text-xl font-bold mb-2">Branches Nationwide</h3>

            <p class="text-gray-600 text-center">
                Access our gyms across the country — wherever you are, we’re nearby.
            </p>
        </div>
    </div>

    <div class="text-center mt-12">
        <a href="{{ route('register') }}"
            class="font-epundaslab bg-secondary text-white px-8 py-4 rounded-lg text-lg font-bold hover:text-black transition duration-300">
            Join Now
        </a>
    </div>
</section>
@endsection