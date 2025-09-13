@extends('layouts.public')

@section('content')
<section class="relative text-center mt-12 px-6">
    <h1 class="font-benguiat text-5xl md:text-6xl font-bold text-gray-900 mb-4">
        Welcome to Anytime Witness
    </h1>
    <p class="font-epundaslab text-lg text-gray-700 max-w-2xl mx-auto mb-6">
        Discover our gym, explore our classes, and find the perfect plan before joining!
    </p>
    <a href="{{ route('guest.about') }}" 
       class="font-epundaslab bg-secondary text-white px-8 py-3 rounded-lg shadow hover:text-black hover:bg-white transition duration-300">
        Know More
    </a>
</section>

<div x-data="{ activeSlide: 0, slides: ['images/gym1.jpg', 'images/gym2.jpg', 'images/web.jpg'] }" 
     class="relative w-full max-w-5xl mx-auto mt-12">

    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" 
             class="w-full h-64 md:h-[28rem] overflow-hidden rounded-xl shadow-lg transition duration-500">
            <img :src="`/${slide}`" alt="Carousel Slide" 
                 class="w-full h-full object-cover">
        </div>
    </template>

    <button @click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1" 
        class="absolute left-0 ml-4 top-1/2 transform -translate-y-1/2 bg-secondary bg-opacity-70 hover:bg-opacity-90 text-white px-4 py-2 rounded-full shadow">
        ‹
    </button>

    <button @click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1" 
        class="absolute right-0 mr-4 top-1/2 transform -translate-y-1/2 bg-secondary bg-opacity-70 hover:bg-opacity-90 text-white px-4 py-2 rounded-full shadow">
        ›
    </button>

    <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" 
                class="w-3 h-3 rounded-full transition" 
                :class="activeSlide === index ? 'bg-blue-500 scale-125' : 'bg-gray-400'"></button>
        </template>
    </div>
</div>

<div class="relative bg-gray-900 mt-12">
    <div class="absolute inset-0">
        <img src="{{ asset('images/gym2.jpg') }}" alt="Gym Background" 
             class="w-full h-full object-cover opacity-30">
    </div>
    <div class="relative max-w-7xl mx-auto py-16 px-6 lg:px-8 text-center">
        <h2 class="font-benguiat text-4xl md:text-5xl font-bold text-white mb-6">
            Join Anytime Witness Today!
        </h2>
        <p class="font-epundaslab text-lg text-gray-200 max-w-2xl mx-auto mb-8">
            Experience the ultimate fitness journey with our expert trainers, dynamic classes, 
            and supportive community. Start now and become the best version of yourself!
        </p>
        <a href="{{ route('register') }}" 
           class="bg-secondary text-white px-8 py-3 rounded-lg shadow-lg hover:text-black hover:bg-white transition duration-300">
            Get Started
        </a>
    </div>
</div>
@endsection
