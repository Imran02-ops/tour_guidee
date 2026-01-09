@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/gggg.png') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white text-5xl font-bold">
Kontak Kami
</div>
</section>

<!-- CONTENT -->
<section class="max-w-6xl mx-auto px-8 py-20 grid md:grid-cols-2 gap-12">

<!-- INFO BOX -->
<div class="bg-white p-10 rounded-2xl shadow-xl">
<h3 class="text-3xl font-bold text-teal-700 mb-6">Hubungi Kami</h3>

<p class="text-gray-700 mb-3 text-lg">
<b>JejakLangkah.id</b><br>
📍 Lombok & Sumbawa, NTB
</p>

<p class="mb-3">
📞 <a href="https://wa.me/6281944872700" class="text-teal-700 font-semibold hover:underline">
+62 819-4487-2700
</a>
</p>

<p class="mb-6">
✉️ <a href="mailto:info@jejaklangkah.id" class="text-teal-700 hover:underline">
info@jejaklangkah.id
</a>
</p>

<a href="https://wa.me/6281944872700" target="_blank"
   class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-semibold transition">
Contact Us →
</a>
</div>

<!-- FORM -->
<form onsubmit="sendWA(event)" class="bg-white p-10 rounded-2xl shadow-xl">

<h3 class="text-2xl font-bold text-teal-700 mb-6">Kirim Pesan</h3>

<input id="nama" type="text" placeholder="Nama Lengkap"
       class="w-full mb-4 p-3 border rounded-lg focus:ring focus:ring-teal-200" required>

<input id="email" type="email" placeholder="Email"
       class="w-full mb-4 p-3 border rounded-lg focus:ring focus:ring-teal-200" required>

<textarea id="pesan" placeholder="Pesan"
          class="w-full mb-6 p-3 border rounded-lg h-36 focus:ring focus:ring-teal-200" required></textarea>

<button class="bg-teal-700 hover:bg-teal-800 text-white px-8 py-3 rounded-full font-semibold transition w-full">
Kirim Pesan
</button>

</form>

</section>

<!-- MAP -->
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


<script>
function sendWA(e){
    e.preventDefault();

    const nama  = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const pesan = document.getElementById('pesan').value;

    const text = `Halo JejakLangkah.id%0A%0ANama: ${nama}%0AEmail: ${email}%0APesan: ${pesan}`;

    window.open(`https://wa.me/6281944872700?text=${text}`, '_blank');
}
</script>

@endsection
