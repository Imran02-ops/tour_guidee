<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>JejakLangkah.id</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.tailwindcss.com"></script>

<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#f3f4f6}

.hero-bg{
    background-image:url('{{ asset('images/bg22.jpeg') }}');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    min-height:100vh;
}

.glass-box{
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(14px);
    border-radius:24px;
    border:1px solid rgba(255,255,255,.25);
}

.nav-link{
    position:relative;
    padding-bottom:4px;
    transition:color .3s ease;
}
.nav-link::after{
    content:"";
    position:absolute;
    left:0;
    bottom:-3px;
    width:0;
    height:3px;
    background:white;
    border-radius:999px;
    transition:width .3s ease;
}
.nav-link:hover{color:#d1fae5}
.nav-link:hover::after{width:100%}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="bg-teal-700 shadow-lg fixed top-0 left-0 w-full z-50">
<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

<div class="flex items-center gap-3">
    <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">
    <span class="text-white text-2xl font-extrabold tracking-wide">JejakLangkah.id</span>
</div>

<nav class="flex items-center gap-8 text-white font-semibold">
    <a href="{{ url('/') }}" 
       class="nav-link {{ request()->is('/') ? 'text-yellow-300' : '' }}">
        Home
    </a>
    <a href="{{ url('/profil-jejaklangkah') }}" 
       class="nav-link {{ request()->is('profil-jejaklangkah') ? 'text-yellow-300' : '' }}">
        Profil
    </a>
    <a href="{{ url('/layanan-jejaklangkah') }}" 
       class="nav-link {{ request()->is('layanan-jejaklangkah') ? 'text-yellow-300' : '' }}">
        Layanan
    </a>
    <a href="{{ url('/galeri-jejaklangkah') }}" 
       class="nav-link {{ request()->is('galeri-jejaklangkah') ? 'text-yellow-300' : '' }}">
        Galeri
    </a>
    <a href="{{ url('/kontak-jejaklangkah') }}" 
       class="nav-link {{ request()->is('kontak-jejaklangkah') ? 'text-yellow-300' : '' }}">
        Kontak
    </a>
    <a href="{{ url('/kontak-jejaklangkah') }}"
       class="ml-6 bg-green-600 hover:bg-green-700 px-5 py-2 rounded-full shadow transition">
        Contact Us →
    </a>

</nav>


</div>
</header>

<!-- ================= CONTENT ================= -->
<main class="pt-28">
@yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-[#0E3B36] text-white mt-24">
<div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-3 gap-10">

<div>
<h3 class="text-2xl font-bold mb-4">JejakLangkah.id</h3>
<p class="text-sm leading-relaxed text-white/80">
JejakLangkah.id adalah platform wisata digital yang menghubungkan wisatawan
dengan destinasi terbaik dan guide profesional di Nusa Tenggara Barat.
</p>
</div>

<div>
<h4 class="font-semibold text-lg mb-4">Kontak Kami</h4>
<ul class="space-y-2 text-sm text-white/80">
<li>📍 Lombok, Nusa Tenggara Barat</li>
<li>📧 info@jejaklangkah.id</li>
<li>📞 +62 812-6102-8030</li>
</ul>
</div>

<div class="flex flex-col justify-between">
<div>
<h4 class="font-semibold text-lg mb-4">Informasi</h4>
<p class="text-sm text-white/80">
Platform resmi promosi wisata dan layanan pemandu wisata lokal.
</p>
</div>

<p class="text-sm text-white/60 mt-8">
© {{ date('Y') }} <span class="text-white font-semibold">JejakLangkah.id</span>  
All rights reserved.
</p>
</div>

</div>
</footer>

</body>
</html>
