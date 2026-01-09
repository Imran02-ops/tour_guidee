@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/galeri-bg.jpg') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Galeri
</div>
</section>

<section class="max-w-7xl mx-auto px-8 py-20 grid grid-cols-2 md:grid-cols-4 gap-6">

@for($i=1;$i<=8;$i++)
<img src="{{ asset("images/gallery/$i.jpg") }}"
class="rounded-xl shadow hover:scale-105 transition">
@endfor

</section>

@endsection
