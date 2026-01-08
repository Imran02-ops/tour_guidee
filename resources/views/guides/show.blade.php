@extends('layouts.app')
@section('content')

<div class="relative min-h-screen flex items-center justify-center">

{{-- BACKGROUND --}}
<div class="absolute inset-0 -z-10">
    <img src="{{ asset($guide['background']) }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
</div>

<div class="bg-white/50 backdrop-blur-3xl rounded-3xl shadow-2xl p-12 max-w-5xl w-full flex flex-col md:flex-row items-center gap-10 border border-white/30">

{{-- FOTO --}}
<img src="{{ asset($guide['photo']) }}"
     class="w-64 h-64 object-cover rounded-full border-4 border-teal-500 shadow-xl">

{{-- INFO --}}
<div>
    <h2 class="text-4xl font-bold mb-2">{{ $guide['name'] }}</h2>
    <p class="text-gray-600 mb-3">{{ $guide['specialty'] }}</p>

    <p class="text-lg mb-4">
        ⭐ {{ $guide['rating'] }} · {{ $guide['experience'] }}
    </p>

    <p class="text-gray-700 mb-6">
        {{ $guide['description'] }}
    </p>
</div>

</div>
</div>
@endsection
