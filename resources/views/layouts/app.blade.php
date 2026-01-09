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

/* ===== PRO MOBILE NAVBAR ANIMATION ===== */
#menu {
    transition: transform .35s ease, opacity .35s ease;
}
#menu.closed {
    transform: translateY(-15px);
    opacity: 0;
    pointer-events: none;
}
#menu.open {
    transform: translateY(0);
    opacity: 1;
}

#menuBtn span {
    transition: all .3s ease;
}
#menuBtn.open span:nth-child(1) {
    transform: rotate(45deg) translate(5px,5px);
}
#menuBtn.open span:nth-child(2) {
    opacity: 0;
}
#menuBtn.open span:nth-child(3) {
    transform: rotate(-45deg) translate(6px,-6px);
}

.backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.35);
    backdrop-filter: blur(5px);
    z-index: 40;
    display: none;
}
.backdrop.show {
    display: block;
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="bg-[#0f3f3b] shadow-lg fixed top-0 left-0 w-full z-50">
<div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-between">

<div class="flex items-center gap-3">   
    <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">
</div>

<button id="menuBtn" class="md:hidden flex flex-col gap-1.5 text-white">
    <span class="w-7 h-0.5 bg-white"></span>
    <span class="w-7 h-0.5 bg-white"></span>
    <span class="w-7 h-0.5 bg-white"></span>
</button>

<nav id="menu" class="closed md:open absolute md:static top-full left-0 w-full md:w-auto bg-[#0f3f3b] md:bg-transparent 
flex flex-col md:flex-row items-center gap-4 md:gap-8 text-white font-semibold py-6 md:py-0">

    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'text-yellow-300' : '' }}">Home</a>
    <a href="{{ url('/profil-jejaklangkah') }}" class="nav-link {{ request()->is('profil-jejaklangkah') ? 'text-yellow-300' : '' }}">Profil</a>
    <a href="{{ url('/galeri-jejaklangkah') }}" class="nav-link {{ request()->is('galeri-jejaklangkah') ? 'text-yellow-300' : '' }}">Galeri</a>
    <a href="{{ url('/kontak-jejaklangkah') }}" class="nav-link {{ request()->is('kontak-jejaklangkah') ? 'text-yellow-300' : '' }}">Kontak</a>
    <a href="https://wa.me/6281944872700" target="_blank"
       class="bg-green-600 hover:bg-green-700 px-5 py-2 rounded-full shadow transition">
       Contact Us →
    </a>
</nav>

</div>
</header>

<!-- ================= CONTENT ================= -->
<main class="pt-32 md:pt-28">
@yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-[#0f3d3a] text-white mt-32 relative">

<div class="absolute left-1/2 -top-16 transform -translate-x-1/2 bg-green-700 
            rounded-2xl px-6 md:px-10 py-6 shadow-xl flex flex-col md:flex-row items-center gap-6 w-[90%] max-w-5xl">

<h3 class="text-base md:text-lg font-bold flex-1 text-center md:text-left">
    Mulailah Perjalanan Yang Tak Terlupakan! Jelajahi Permata Tersembunyi JejakLangkah.id
</h3>

<a href="https://wa.me/6281944872700" target="_blank"
   class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold shadow hover:bg-yellow-300 transition">
   Hubungi Kami →
</a>
</div>

<div class="max-w-7xl mx-auto px-6 pt-40 pb-16 grid grid-cols-1 md:grid-cols-3 gap-10">

<div>
    <h3 class="text-xl font-bold mb-3">JejakLangkah.id</h3>
    <p class="text-sm text-gray-200 leading-relaxed">
        JejakLangkah.id adalah platform wisata digital yang menghubungkan wisatawan dengan destinasi terbaik
        dan guide profesional di Nusa Tenggara Barat.
    </p>
</div>

<div>
    <h4 class="font-semibold mb-3">Kontak Kami</h4>
    <p>📍 Lombok, Nusa Tenggara Barat</p>
    <p>✉️ info@jejaklangkah.id</p>
    <p>📞 +62 819-4487-2700</p>
</div>

<div>
    <h4 class="font-semibold mb-3">Informasi</h4>
    <p>Platform resmi promosi wisata dan layanan pemandu wisata lokal.</p>
    <p class="mt-4 text-sm">© 2026 <b>JejakLangkah.id</b> All rights reserved.</p>
</div>

</div>
</footer>

<div id="backdrop" class="backdrop"></div>

<script>
const btn = document.getElementById('menuBtn');
const menu = document.getElementById('menu');
const backdrop = document.getElementById('backdrop');
const links = menu.querySelectorAll('a');

function openMenu(){
    menu.classList.remove('closed');
    menu.classList.add('open');
    btn.classList.add('open');
    backdrop.classList.add('show');
    document.body.classList.add('overflow-hidden');
}

function closeMenu(){
    menu.classList.add('closed');
    menu.classList.remove('open');
    btn.classList.remove('open');
    backdrop.classList.remove('show');
    document.body.classList.remove('overflow-hidden');
}

btn.addEventListener('click', () => {
    menu.classList.contains('open') ? closeMenu() : openMenu();
});

backdrop.addEventListener('click', closeMenu);
links.forEach(link => link.addEventListener('click', closeMenu));

let startY = 0;
menu.addEventListener('touchstart', e => startY = e.touches[0].clientY);
menu.addEventListener('touchmove', e => {
    if (e.touches[0].clientY - startY > 80) closeMenu();
});
</script>

</body>
</html>
