@extends('layouts.app')

@section('content')

<section class="relative h-[240px] md:h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/gggg.png') }}')">
<div class="absolute inset-0 bg-black/40"></div>
<div class="relative h-full flex items-center justify-center text-white 
            text-3xl md:text-5xl font-bold text-center px-4">
Kontak Kami
</div>
</section>

<section class="max-w-6xl mx-auto px-4 md:px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-10">

<div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">
<h3 class="text-2xl md:text-3xl font-bold text-teal-700 mb-6">Hubungi Kami</h3>

<p class="text-gray-700 mb-3">
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

<form onsubmit="sendWA(event)" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">

<h3 class="text-xl md:text-2xl font-bold text-teal-700 mb-6">Kirim Pesan</h3>

<input id="nama" type="text" placeholder="Nama Lengkap"
class="w-full mb-4 p-3 border rounded-lg" required>

<input id="email" type="email" placeholder="Email"
class="w-full mb-4 p-3 border rounded-lg" required>

<textarea id="pesan" placeholder="Pesan"
class="w-full mb-6 p-3 border rounded-lg h-32" required></textarea>

<button class="bg-teal-700 hover:bg-teal-800 text-white px-8 py-3 rounded-full font-semibold transition w-full">
Kirim Pesan
</button>

</form>

</section>

<div class="max-w-6xl mx-auto px-4 md:px-8 pb-24">
<h2 class="text-3xl md:text-4xl font-bold text-center mb-8">
Peta <span class="text-teal-700">NTB</span>
</h2>

<iframe
src="https://www.google.com/maps?q=Lombok%20Nusa%20Tenggara%20Barat&output=embed"
class="w-full h-[260px] md:h-[420px] rounded-xl border-0"
loading="lazy"></iframe>
</div>

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
