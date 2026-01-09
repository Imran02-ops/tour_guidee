@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative h-[220px] sm:h-[260px] md:h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/gggg.png') }}')">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative h-full flex items-center justify-center text-white 
                text-3xl sm:text-4xl md:text-5xl font-bold">
        Profil
    </div>
</section>

<!-- CONTENT -->
<section class="max-w-7xl mx-auto px-5 sm:px-8 py-14 sm:py-20
                grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-center">

    <!-- LOGO -->
    <div class="flex justify-center">
        <img src="{{ asset('images/logo.png') }}"
             class="w-40 sm:w-52 md:w-64 drop-shadow-lg">
    </div>

    <!-- TEXT -->
    <div class="text-center md:text-left">
        <h2 class="text-2xl sm:text-3xl font-bold text-teal-700 mb-4">
            JejakLangkah.id
        </h2>

        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
            Jejak Langkah adalah penyedia layanan pemandu wisata (tour guide) profesional 
            yang berfokus pada eksplorasi keindahan alam dan kekayaan budaya lokal. Kami 
            percaya bahwa setiap perjalanan bukan sekadar berpindah tempat, melainkan cara 
            kita meninggalkan jejak bermakna di setiap destinasi yang dikunjungi.
        </p>
    </div>

</section>

@endsection
