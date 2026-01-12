@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="relative h-[240px] md:h-[300px] bg-cover bg-center overflow-hidden"
style="background-image:url('{{ asset('images/gggg.png') }}')">

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative h-full flex items-center justify-center">
    <h1 class="hero-title text-white text-3xl md:text-5xl font-extrabold tracking-wide text-center px-4">
        Kontak Kami
    </h1>
</div>
</section>

<!-- ================= CONTACT ================= -->
<section class="max-w-6xl mx-auto px-4 md:px-8 py-20
grid grid-cols-1 md:grid-cols-2 gap-10">

<div class="contact-card">
    <h3 class="text-2xl md:text-3xl font-bold text-teal-700 mb-6">Hubungi Kami</h3>

    <p class="text-gray-700 mb-3">
        <b>JejakLangkah.id</b><br>
        📍 Lombok & Sumbawa, NTB
    </p>

    <p class="mb-3">
        📞 <a href="https://wa.me/6281944872700" class="text-teal-700 font-semibold hover:underline">
        +62 819-4487-2700</a>
    </p>

    <p class="mb-6">
        ✉️ <a href="mailto:info@jejaklangkah.id" class="text-teal-700 hover:underline">
        info@jejaklangkah.id</a>
    </p>

    <a href="https://wa.me/6281944872700" target="_blank"
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-7 py-3 rounded-full font-semibold transition">
        Contact Us →
    </a>
</div>

<form onsubmit="sendWA(event)" class="contact-card delay">
<h3 class="text-xl md:text-2xl font-bold text-teal-700 mb-6">Kirim Pesan</h3>

<input id="nama" type="text" placeholder="Nama Lengkap"
class="w-full mb-4 p-3 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none" required>

<input id="email" type="email" placeholder="Email"
class="w-full mb-4 p-3 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none" required>

<textarea id="pesan" placeholder="Pesan"
class="w-full mb-6 p-3 border rounded-lg h-32 focus:ring-2 focus:ring-teal-400 outline-none" required></textarea>

<button class="bg-teal-700 hover:bg-teal-800 text-white px-8 py-3 rounded-full font-semibold transition w-full">
Kirim Pesan
</button>
</form>
</section>

<!-- ================= WAVE DIVIDER ================= -->
<div class="relative overflow-hidden">
<svg viewBox="0 0 1440 120" class="block w-full h-24">
<path fill="#ecfeff"
d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,0L0,0Z">
</path>
</svg>
</div>

<!-- ================= MAP SECTION ================= -->
<section class="relative bg-gradient-to-br from-teal-50 via-white to-emerald-50 py-24">

<div class="absolute -top-32 -left-32 w-96 h-96 bg-teal-300/20 rounded-full blur-3xl"></div>
<div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-300/20 rounded-full blur-3xl"></div>

<div class="relative max-w-6xl mx-auto px-4 md:px-8 map-wrap">

<h2 class="text-3xl md:text-4xl font-bold text-center mb-10">
Peta <span class="text-teal-700">NTB</span>
</h2>

<div class="relative map-container">
<iframe
src="https://www.google.com/maps?q=Lombok%20Nusa%20Tenggara%20Barat&output=embed"
class="map-frame"
loading="lazy"></iframe>

<div class="custom-pin" title="JejakLangkah.id - NTB"></div>
</div>
</div>
</section>

<!-- ================= STYLE ================= -->
<style>
.hero-title{animation:fadeDown 1s ease forwards;}
@keyframes fadeDown{from{opacity:0;transform:translateY(-30px)}to{opacity:1;transform:translateY(0)}}

.contact-card{
    background:#fff;
    padding:36px;
    border-radius:20px;
    box-shadow:0 25px 50px rgba(0,0,0,.08);
    opacity:0;
    transform:translateY(60px);
    transition:1s ease;
}
.contact-card.show{opacity:1;transform:translateY(0)}
.contact-card.delay{transition-delay:.2s}
.contact-card:hover{transform:translateY(-8px) scale(1.02)}

.map-wrap{opacity:0;transform:translateY(60px);transition:1s ease}
.map-wrap.show{opacity:1;transform:translateY(0)}

.map-container{position:relative;border-radius:22px;overflow:hidden}
.map-frame{width:100%;height:420px;border:0;transition:.6s ease}
.map-container:hover .map-frame{filter:brightness(1.05) contrast(1.05);transform:scale(1.02)}

.custom-pin{
    position:absolute;
    top:48%;left:58%;
    font-size:32px;
    cursor:pointer;
    animation:pinFloat 2.5s ease-in-out infinite;
    transition:.4s ease;
}
.custom-pin:hover{transform:scale(1.4)}
@keyframes pinFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
</style>

<!-- ================= SCRIPT ================= -->
<script>
const reveals=document.querySelectorAll('.contact-card,.map-wrap');
function revealOnScroll(){
    reveals.forEach(el=>{
        if(el.getBoundingClientRect().top < window.innerHeight-120){
            el.classList.add('show');
        }
    });
}
window.addEventListener('scroll',revealOnScroll);
revealOnScroll();

function sendWA(e){
    e.preventDefault();
    const nama=document.getElementById('nama').value;
    const email=document.getElementById('email').value;
    const pesan=document.getElementById('pesan').value;
    const text=`Halo JejakLangkah.id%0A%0ANama: ${nama}%0AEmail: ${email}%0APesan: ${pesan}`;
    window.open(`https://wa.me/6281944872700?text=${text}`,'_blank');
}
</script>

@endsection
