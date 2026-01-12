@extends('layouts.app')

@section('content')

{{-- ================= HERO CAROUSEL ================= --}}
<section class="relative min-h-screen overflow-hidden">

    {{-- BACKGROUND IMAGES --}}
    <div id="heroCarousel" class="absolute inset-0">
        @php
            $heroImages = [
                'images/bg22.jpeg',
                'images/gggg.png',
                'images/categories/pantai1.jpg'
            ];
        @endphp

        @foreach($heroImages as $i => $img)
            <div
                class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                style="background-image:url('{{ asset($img) }}')">
            </div>
        @endforeach
    </div>

    {{-- DARK OVERLAY --}}
    <div class="absolute inset-0 bg-black/70"></div>

    {{-- CONTENT --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center px-6 md:px-10">
        <div class="w-full max-w-6xl text-center md:text-left text-green-400">

            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                EXPLORE <br> THE WORLD
            </h1>

            <p class="text-base md:text-lg mb-8 max-w-2xl text-green-200">
                Temukan destinasi wisata terbaik dengan tour guide profesional,
                rating tinggi, dan sistem booking mudah.
            </p>

            {{-- SEARCH --}}
            <form action="{{ route('destinations.index') }}" method="GET"
                  class="flex flex-col md:flex-row gap-4 max-w-2xl mb-10">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari pantai, gunung, budaya..."
                    class="flex-1 px-6 py-3 rounded-full text-gray-800 focus:outline-none">

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-bold transition">
                    🔍 Cari
                </button>
            </form>

            {{-- INFO BOX --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl">

                <a href="{{ route('destinations.index') }}"
                   class="bg-black/50 border border-green-500 rounded-2xl flex items-center gap-4 px-6 py-5 hover:scale-105 transition">

                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-green-600 flex items-center justify-center text-white">
                        📍
                    </div>

                    <div>
                        <p class="text-lg md:text-xl font-bold text-green-300">
                            50+ Destinasi Wisata
                        </p>
                        <p class="text-sm text-green-200">
                            Pilihan terbaik di NTB
                        </p>
                    </div>
                </a>

                <a href="{{ route('guides.index') }}"
                   class="bg-black/50 border border-green-500 rounded-2xl flex items-center gap-4 px-6 py-5 hover:scale-105 transition">

                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-green-600 flex items-center justify-center text-white">
                        🧭
                    </div>

                    <div>
                        <h3 class="text-base md:text-lg font-bold text-green-300">
                            Guide Profesional
                        </h3>
                        <p class="text-sm text-green-200">
                            Berpengalaman & terpercaya
                        </p>
                    </div>
                </a>

            </div>

        </div>
    </div>
</section>

{{-- ================= INTRO ================= --}}
<section id="intro" class="bg-white py-20 px-6 md:px-10">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

<div>
<h2 class="text-3xl md:text-4xl font-extrabold text-teal-700 leading-tight">
Destinasi Wisata <br> NTB
</h2>
</div>

<div>
<p class="text-gray-600 text-base md:text-lg leading-relaxed">
Jelajahi berbagai destinasi wisata pilihan mulai dari pantai eksotis,
pegunungan indah, air terjun alami, hingga wisata budaya, tradisional dan wisata religi.
Semua destinasi telah dikurasi untuk memberikan pengalaman terbaik
bersama tour guide profesional dari JejakLangkah.id
</p>
</div>

</div>
</section>

{{-- ================= KATEGORI ================= --}}
<section class="bg-gray-100 py-20 px-6 md:px-10">
<h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">
Kategori Wisata
</h2>

@php
$categories=[
'pantai'=>'pantai1.jpg',
'wisata-alam'=>'alam.jpeg',
'pegunungan-bukit'=>'gunung.jpeg',
'wisata-tradisional'=>'sade.png',
'wisata-religi'=>'wisata religi.jpeg'
];
@endphp

<div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-8 max-w-7xl mx-auto">

@foreach($categories as $slug=>$image)
<a href="{{ route('destinations.index',['category'=>$slug]) }}"
class="relative rounded-2xl overflow-hidden shadow-lg group hover:-translate-y-2 transition">

<img src="{{ asset('images/categories/'.$image) }}"
class="h-40 md:h-48 w-full object-cover group-hover:scale-110 transition">

<div class="absolute inset-0 bg-black/40 flex items-center justify-center">
<span class="text-white text-lg md:text-2xl font-bold capitalize">
{{ str_replace('-',' ',$slug) }}
</span>
</div>

</a>
@endforeach

</div>
</section>

{{-- ================= HERO CAROUSEL SCRIPT ================= --}}
<script>
const slides = document.querySelectorAll('.hero-slide');
let current = 0;

setInterval(() => {
    slides[current].classList.remove('opacity-100');
    slides[current].classList.add('opacity-0');

    current = (current + 1) % slides.length;

    slides[current].classList.remove('opacity-0');
    slides[current].classList.add('opacity-100');
}, 2000);
</script>

@endsection
