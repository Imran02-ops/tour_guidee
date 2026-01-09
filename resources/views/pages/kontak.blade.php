@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/kontak-bg.jpg') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Kontak
</div>
</section>

<section class="max-w-5xl mx-auto px-8 py-20 grid md:grid-cols-2 gap-10">

<div>
<h3 class="text-2xl font-bold text-teal-700 mb-4">Hubungi Kami</h3>
<p class="text-gray-600">
JejakLangkah.id<br>
📞 +62 819-4487-2700<br>
✉️ info@JejakLangkah.id
</p>
</div>

<form class="bg-white p-8 rounded-xl shadow">
<input class="w-full border p-3 mb-4 rounded" placeholder="Nama">
<input class="w-full border p-3 mb-4 rounded" placeholder="Email">
<textarea class="w-full border p-3 mb-4 rounded" placeholder="Pesan"></textarea>
<button class="bg-teal-600 text-white px-6 py-3 rounded hover:bg-teal-700 transition">
Kirim Pesan
</button>
</form>

</section>

@endsection
