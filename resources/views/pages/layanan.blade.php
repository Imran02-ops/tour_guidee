@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/layanan-bg.jpg') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Layanan
</div>
</section>

<section class="max-w-7xl mx-auto px-8 py-20 grid md:grid-cols-3 gap-8">

@foreach(['Paket Wisata','Guide Lokal','Transportasi'] as $item)
<div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
<h3 class="text-xl font-bold text-teal-700 mb-3">{{ $item }}</h3>
<p class="text-gray-600 text-sm">
Layanan profesional untuk pengalaman wisata terbaik di NTB.
</p>
</div>
@endforeach

</section>

@endsection
