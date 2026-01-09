@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/profil-bg.jpg') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Profil
</div>
</section>

<section class="max-w-7xl mx-auto px-8 py-20 grid md:grid-cols-2 gap-12">

<div class="flex justify-center">
<img src="{{ asset('images/logo-desa.png') }}" class="w-64 drop-shadow-lg">
</div>

<div>
<h2 class="text-3xl font-bold text-teal-700 mb-4">JejakLangkah.id</h2>
<p class="text-gray-600 leading-relaxed">
Desa Aik Berik merupakan kawasan wisata alam unggulan di Lombok Tengah yang
menawarkan air terjun, trekking, budaya lokal, dan pengalaman desa yang otentik.
</p>
</div>

</section>

@endsection
