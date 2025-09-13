@extends('layouts.public')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="font-benguiat text-5xl font-bold text-gray-900 mb-4">Pricing Plans</h1>
        <p class="font-epundaslab text-lg text-gray-600">
            Choose the plan that fits your lifestyle and fitness goals.
        </p>
    </div>

    <div class="grid gap-8 md:grid-cols-3">
        <div class="p-8 bg-white rounded-lg shadow-lg hover:shadow-2xl transition">
            <h3 class="font-epundaslab text-2xl font-bold mb-4">Basic</h3>
            <p class="text-gray-600 mb-6">Perfect for beginners who want to get started.</p>
            <p class="text-4xl font-bold text-primary mb-6">₱1,500<span class="text-lg text-gray-600">/mo</span></p>
            <ul class="text-gray-700 space-y-3 mb-8">
                <li>✔ Access to gym equipment</li>
                <li>✔ Free locker</li>
                <li>✔ 1 fitness consultation</li>
                <li>✘ Group classes</li>
                <li>✘ Personal trainer</li>
            </ul>
        </div>

        <div class="p-8 bg-primary text-white rounded-lg shadow-lg hover:shadow-2xl transition transform scale-105">
            <h3 class="font-epundaslab text-2xl font-bold mb-4">Standard</h3>
            <p class="mb-6">Our most popular plan with extra perks.</p>
            <p class="text-4xl font-bold mb-6">₱2,500<span class="text-lg">/mo</span></p>
            <ul class="space-y-3 mb-8">
                <li>✔ Unlimited gym access</li>
                <li>✔ Group fitness classes</li>
                <li>✔ Free locker + shower</li>
                <li>✔ 2 personal trainer sessions</li>
                <li>✘ Nutrition plan</li>
            </ul>
        </div>

        <div class="p-8 bg-white rounded-lg shadow-lg hover:shadow-2xl transition">
            <h3 class="font-epundaslab text-2xl font-bold mb-4">Premium</h3>
            <p class="text-gray-600 mb-6">For serious fitness enthusiasts.</p>
            <p class="text-4xl font-bold text-primary mb-6">₱3,500<span class="text-lg text-gray-600">/mo</span></p>
            <ul class="text-gray-700 space-y-3 mb-8">
                <li>✔ Unlimited gym access</li>
                <li>✔ All group classes</li>
                <li>✔ Free locker + shower</li>
                <li>✔ Weekly personal trainer</li>
                <li>✔ Custom nutrition plan</li>
            </ul>
        </div>
    </div>
</section>
@endsection
