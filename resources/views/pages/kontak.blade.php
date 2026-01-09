@extends('layouts.app')

@section('content')

<section class="relative h-[300px] bg-cover bg-center"
style="background-image:url('{{ asset('images/gggg.png') }}')">
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

<form onsubmit="sendWA(event)" class="bg-white p-8 rounded-2xl shadow-xl max-w-md">

    <input id="nama" type="text" placeholder="Nama"
           class="w-full mb-4 p-3 border rounded-lg" required>

    <input id="email" type="email" placeholder="Email"
           class="w-full mb-4 p-3 border rounded-lg" required>

    <textarea id="pesan" placeholder="Pesan"
              class="w-full mb-4 p-3 border rounded-lg h-32" required></textarea>

    <button class="bg-teal-700 text-white px-6 py-3 rounded-lg font-semibold">
        Kirim Pesan
    </button>
</form>

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


</section>

@endsection
