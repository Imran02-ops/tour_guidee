@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-8 py-24">

    <section class="relative h-[300px] bg-cover bg-center"style="background-image:url('{{ asset('images/gggg.png') }}')">
        <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">Kontak Kami</div>
    </section>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">

        @foreach([
            '1.jpg','2.jpg','3.jpg','4.jpg','5.jpg',
            '6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',
            '11.jpg','12.jpg','13.jpg','14.jpg','15.jpg'
        ] as $img)

            <div class="overflow-hidden rounded-xl shadow group aspect-[4/5] bg-gray-100">
                <img 
                    src="{{ asset('images/gallery/'.$img) }}" 
                    alt="Galeri JejakLangkah"
                    class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
            </div>

        @endforeach

    </div>

</div>

@endsection
