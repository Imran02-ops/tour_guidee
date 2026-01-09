@extends('layouts.app')

@section('content')

<div class="relative min-h-screen flex items-center justify-center px-8 py-24">

    {{-- Background --}}
    <div class="absolute inset-0 -z-10">
        <img src="{{ asset($guide['background']) }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    {{-- Card --}}
    <div class="bg-white/70 backdrop-blur-2xl rounded-3xl shadow-2xl p-12 max-w-5xl w-full flex flex-col md:flex-row items-center gap-10 border border-white/30">

        {{-- Foto --}}
        <img src="{{ asset($guide['photo']) }}"
             class="w-64 h-64 object-cover rounded-full border-4 border-teal-600 shadow-xl">

        {{-- Info --}}
        <div class="flex-1">

            <h2 class="text-4xl font-bold mb-2">{{ $guide['name'] }}</h2>

            <p class="text-gray-600 text-lg mb-1">
                {{ $guide['specialty'] }}
            </p>

            <p class="text-gray-700 mb-4">
                ⭐ {{ $guide['rating'] }} · {{ $guide['experience'] }}
            </p>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $guide['description'] }}
            </p>

            <div class="flex gap-4">
                <a href="{{ url()->previous() }}"
                   class="px-6 py-3 rounded-full border border-gray-400 text-gray-700 hover:bg-gray-200 transition">
                   ← Kembali
                </a>

                <a href="https://wa.me/{{ $guide['phone'] }}?text=Halo,%20saya%20ingin%20booking%20guide%20{{ urlencode($guide['name']) }}"
                   target="_blank"
                   class="px-8 py-3 rounded-full bg-green-600 hover:bg-green-700 text-white font-semibold transition shadow-lg">
                   Booking via WhatsApp
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
