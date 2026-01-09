@extends('layouts.app')

@section('content')

<section class="hero-bg flex items-center justify-center px-6 md:px-10 min-h-screen">
<div class="glass-box max-w-5xl w-full p-8 md:p-12 text-white">

<h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
EXPLORE <br> THE WORLD
</h1>

<p class="text-base md:text-lg mb-8 max-w-2xl">
Temukan destinasi wisata terbaik dengan tour guide profesional,
rating tinggi, dan sistem booking mudah.
</p>

<a href="#intro"
class="inline-block bg-white text-teal-700 px-6 md:px-8 py-3 md:py-4 rounded-full font-bold shadow hover:bg-gray-200 transition">
Explore Categories
</a>

<!-- INFO BOX -->
<div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

<a href="{{ route('destinations.index') }}"
class="glass-box flex items-center gap-4 px-6 py-5 hover:scale-105 transition">

<div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-teal-100 flex items-center justify-center">
📍
</div>

<div>
<p class="text-lg md:text-xl font-bold text-white">50+ Destinasi Wisata</p>
<p class="text-sm text-white/80">Pilihan terbaik di NTB</p>
</div>
</a>

<a href="{{ route('guides.index') }}"
class="glass-box flex items-center gap-4 px-6 py-5 hover:scale-105 transition">

<div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-teal-100 flex items-center justify-center">
🧭
</div>

<div>
<h3 class="text-base md:text-lg font-bold text-white">Guide Profesional</h3>
<p class="text-sm text-white/80">Berpengalaman & terpercaya</p>
</div>
</a>

</div>

</div>
</section>

<!-- INTRO -->
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

<!-- KATEGORI -->
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

@endsection
