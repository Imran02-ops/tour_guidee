@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="hero-bg flex items-center justify-center px-10 min-h-screen">
    <div class="glass-box max-w-5xl w-full p-12 text-white">
        <h1 class="text-6xl font-extrabold mb-6 leading-tight">
            EXPLORE <br> THE WORLD
        </h1>

        <p class="text-lg mb-8 max-w-2xl">
            Temukan destinasi wisata terbaik dengan tour guide profesional,
            rating tinggi, dan sistem booking mudah.
        </p>

        <a href="#intro"
           class="inline-block bg-white text-teal-700 px-8 py-4 rounded-full font-bold shadow hover:bg-gray-200 transition">
            Explore Categories ↓
        </a>
        <!-- INFO BOX TRANSPARAN -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

        <a href="{{ route('destinations.index') }}"
       class="glass-box flex items-center gap-4 px-6 py-5 hover:scale-105 transition cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-teal-700" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 20l-5.447-2.724A2 2 0 013 15.382V5.618a2 2 0 011.553-1.894L9 2m0 18l6-3m-6 3V2m6 15l5.447 2.724A2 2 0 0021 15.382V5.618a2 2 0 00-1.553-1.894L15 2m0 15V2"/>
                </svg>
            </div>

    <div>
            <p class="text-xl font-bold text-white">50+ Destinasi Wisata</p>
            <p class="text-sm text-white/80">Pilihan terbaik di NTB</p>
        </div>
    </a>

   <a href="{{ route('guides.index') }}"
   class="glass-box group flex items-center gap-5 px-7 py-6 rounded-2xl
          hover:scale-[1.04] hover:bg-white/30 transition-all duration-300
          cursor-pointer shadow-lg">

    <div class="w-14 h-14 rounded-full bg-teal-100 flex items-center justify-center
                group-hover:scale-110 transition">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-7 h-7 text-teal-700"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
    </div>

    <div>
        <h3 class="text-lg font-bold text-white group-hover:text-teal-100 transition">
            Guide Profesional
        </h3>
        <p class="text-sm text-white/80 leading-snug">
            Berpengalaman & terpercaya
        </p>
    </div>
</a>


</div>
    </div>
</section>

<!-- ================= INTRO SECTION ================= -->
<section id="intro" class="bg-white py-20 px-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <!-- LEFT -->
        <div>
            <h2 class="text-4xl font-extrabold text-teal-700 leading-tight">
                Destinasi Wisata <br> NTB
            </h2>
        </div>

        <!-- RIGHT -->
        <div>
            <p class="text-gray-600 text-lg leading-relaxed">
                Jelajahi berbagai destinasi wisata pilihan mulai dari pantai eksotis,
                pegunungan indah, air terjun alami, hingga wisata budaya, tradisional dan wisata religi.
                Semua destinasi telah dikurasi untuk memberikan pengalaman terbaik
                bersama tour guide profesional dari JejakLangkah.id
            </p>
        </div>

    </div>
</section>

<!-- ================= CATEGORY SECTION ================= -->
<section id="kategori" class="bg-gray-100 py-20 px-10">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
        Kategori Wisata
    </h2>

    @php
        $categories = [
            'pantai' => 'pantai1.jpg',
            'wisata-alam' => 'alam.jpeg',
            'pegunungan-bukit' => 'gunung.jpeg',
            'wisata-tradisional' => 'sade.png',
            'wisata-religi' => 'wisata religi.jpeg',
        ];
    @endphp

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 max-w-7xl mx-auto">

        @foreach($categories as $slug => $image)
            <a href="{{ route('destinations.index', ['category' => $slug]) }}"
                class="relative rounded-2xl overflow-hidden shadow-lg group hover:-translate-y-2 transition">
                <img src="{{ asset('images/categories/'.$image) }}"
                     class="h-48 w-full object-cover group-hover:scale-110 transition duration-500">

                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <span class="text-white text-2xl font-bold capitalize">
                        {{ str_replace('-', ' ', $slug) }}
                    </span>
                </div>

            </a>
        @endforeach

    </div>
</section>

@endsection
