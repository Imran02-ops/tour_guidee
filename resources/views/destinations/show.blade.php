    @extends('layouts.app')

    @section('content')
    <div class="min-h-screen bg-teal-700 px-6 md:px-20 py-20 flex items-center justify-center">

        <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl w-full">

            {{-- GAMBAR --}}
            <div class="flex justify-center items-center">
            <img 
                src="{{ asset('storage/'.$destination->image) }}"  class="rounded-2xl shadow-lg w-full object-cover">
            </div>

            {{-- INFO --}}
            <div>
                <h2 class="text-4xl font-bold mb-2 text-gray-800">{{ $destination->name }}</h2>
                <p class="mb-3 text-gray-600">{{ $destination->location }}</p>

                <span class="inline-block mb-4 bg-teal-600 text-white text-sm px-4 py-1 rounded-full">
                    {{ ucfirst(str_replace('-', ' ', $destination->category)) }}
                </span>

                <p class="mb-6 text-gray-700 leading-relaxed">
                    {{ $destination->description }}
                </p>

                <p class="text-2xl font-bold mb-8 text-teal-700">
                    Rp {{ number_format($destination->price,0,',','.') }}
                </p>

                <a href="{{ route('destinations.index') }}"
                class="inline-block bg-teal-600 hover:bg-teal-700 text-white px-8 py-3 rounded-full font-bold transition">
                    ← Kembali
                </a>
            </div>

        </div>

    </div>
    @endsection
