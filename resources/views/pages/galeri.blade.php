@extends('layouts.app')

@section('content')

{{-- ================= HERO GALERI ================= --}}
<section class="relative w-full h-[220px] sm:h-[260px] md:h-[340px]">
    <img src="{{ asset('images/gggg.png') }}"
         class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative h-full flex items-center justify-center px-4">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold tracking-wide text-center">
            Galeri JejakLangkah.id
        </h1>
    </div>
</section>

{{-- ================= GALERI FOTO ================= --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 sm:gap-6">
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

@endsection
