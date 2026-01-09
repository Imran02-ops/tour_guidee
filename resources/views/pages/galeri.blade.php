@extends('layouts.app')

@section('content')

{{-- ================= HERO GALERI ================= --}}
<section class="relative w-full h-[340px]">
    <img src="{{ asset('images/gggg.png') }}"
         class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative h-full flex items-center justify-center">
        <h1 class="text-white text-5xl font-bold tracking-wide">
            Galeri JejakLangkah.id
        </h1>
    </div>
</section>

{{-- ================= GALERI FOTO ================= --}}
<section class="max-w-7xl mx-auto px-6 py-20">

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
@foreach([
 '1.jpg','2.jpg','3.jpg','4.jpg','5.jpg',
 '6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',
 '11.jpg','12.jpg','13.jpg','14.jpg','15.jpg'
] as $img)
    <div class="rounded-xl overflow-hidden shadow-lg aspect-[3/4] bg-gray-200">
        <img src="{{ asset('images/gallery/'.$img) }}"
             class="w-full h-full object-cover hover:scale-110 transition duration-500">
    </div>
@endforeach
</div>

</section>

{{-- ================= MAP NTB ================= --}}
<section class="max-w-7xl mx-auto px-6 pb-24">

<h2 class="text-4xl font-bold text-center mb-10">
    Map <span class="text-teal-700">NTB</span>
</h2>

<div class="rounded-2xl overflow-hidden shadow-xl">
<iframe
    src="https://www.google.com/maps/d/embed?mid=1n4n9cQ4X8vR1ST8b7zZsmG9L0pE&hl=en"
    width="100%"
    height="450"
    style="border:0;"
    loading="lazy">
</iframe>
</div>

</section>

@endsection
