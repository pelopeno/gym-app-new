@extends('layouts.public')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="font-benguiat text-5xl font-bold text-gray-900 mb-4">About Anytime Witness</h1>
        <p class="font-epundaslab text-lg text-gray-600">
            Building strength, confidence, and community — one workout at a time.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-10 items-center mb-12">
        <div>
            <img src="{{ asset('images/gym1.jpg') }}" alt="Our Gym" class="rounded-lg shadow-lg">
        </div>

        <div class="text-left">
            <h2 class="font-epundaslab text-2xl font-bold mb-4">Who We Are</h2>
            <p class="text-gray-700 mb-4 leading-relaxed">
                At Anytime Witness, we believe fitness is more than just exercise — it’s a lifestyle. 
                Our mission is to provide a supportive and motivating environment where everyone can 
                achieve their personal fitness goals, whether you’re a beginner or a pro.
            </p>
            <p class="text-gray-700 mb-4 leading-relaxed">
                With state-of-the-art equipment, professional trainers, and a wide variety of classes, 
                we’re here to help you every step of the way. Join a community that celebrates 
                progress, discipline, and perseverance.
            </p>
            <a href="{{ route('register') }}" 
               class="inline-block font-epundaslab bg-secondary text-white px-6 py-3 rounded hover:text-black transition duration-300">
                Start Your Journey
            </a>
        </div>
    </div>

    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-8 text-center max-w-2xl mx-auto">
        <h2 class="font-epundaslab text-2xl font-bold mb-4">Opening Hours</h2>
        <p class="text-lg">Mon – Fri: <span class="font-bold">6:00 AM – 10:00 PM</span></p>
        <p class="text-lg">Sat – Sun: <span class="font-bold">8:00 AM – 8:00 PM</span></p>
        <div class="mt-4">
            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-500 text-white">
                Open Now
            </span>
        </div>
    </div>
</section>
@endsection
