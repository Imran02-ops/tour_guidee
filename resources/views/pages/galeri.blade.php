@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/gggg.png') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Galeri
</div>
</section>

<section class="max-w-7xl mx-auto px-8 py-20 grid grid-cols-2 md:grid-cols-4 gap-6">

<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-center mb-8">Galeri JejakLangkah.id</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @for($i=1; $i<=8; $i++)
            <div class="overflow-hidden rounded-xl">
                <img src="{{ asset("images/gallery/$i.jpg") }}" 
                     alt="Destinasi NTB {{ $i }}"
                     class="w-full h-64 object-cover shadow-lg hover:scale-110 transition duration-500 ease-in-out">
            </div>
        @endfor
    </div>
</div>

</section>

@endsection
