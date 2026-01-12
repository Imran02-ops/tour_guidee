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

/* ===== SCROLL REVEAL NAVBAR ===== */
.scroll-animate{
    opacity:0;
    transform:translateY(-20px);
    transition:.8s;
}
.scroll-animate.active{
    opacity:1;
    transform:translateY(0);
}

/* ===== FOOTER SLIDE UP ===== */
.footer-animate{
    opacity:0;
    transform:translateY(80px);
    transition:1s;
}
.footer-animate.active{
    opacity:1;
    transform:translateY(0);
}

/* ===== FOOTER CTA PREMIUM ===== */
.footer-cta{
    animation:ctaFloat 6s ease-in-out infinite;
    position:relative;
    overflow:hidden;
}
@keyframes ctaFloat{
    0%,100%{transform:translate(-50%,0)}
    50%{transform:translate(-50%,-8px)}
}
.footer-cta::before{
    content:"";
    position:absolute;
    inset:-60%;
    background:radial-gradient(circle at center, rgba(255,255,255,.18), transparent 60%);
    animation:ctaGlow 8s linear infinite;
}
@keyframes ctaGlow{
    0%{transform:rotate(0deg)}
    100%{transform:rotate(360deg)}
}
.footer-cta:hover{
    transform:translate(-50%,-12px) scale(1.02);
    box-shadow:0 30px 60px rgba(0,0,0,.35);
    transition:.4s;
}

/* ===== PULSE BUTTON ===== */
.pulse-btn{
    animation:pulse 2.2s infinite;
}
@keyframes pulse{
    0%{box-shadow:0 0 0 0 rgba(253,224,71,.7)}
    70%{box-shadow:0 0 0 18px rgba(253,224,71,0)}
    100%{box-shadow:0 0 0 0 rgba(253,224,71,0)}
}

/* ===== NAVBAR ===== */
#navbar{transition:.4s}
.navbar-transparent{background:rgba(0,0,0,.15);backdrop-filter:blur(6px)}
.navbar-colored{background:#0f3f3b;box-shadow:0 10px 25px rgba(0,0,0,.25)}

/* ===== MENU SLIDE IN ===== */
.nav-item{
    opacity:0;
    transform:translateY(-10px);
    animation:slideIn .6s forwards;
    position:relative;
}
.nav-item:nth-child(1){animation-delay:.1s}
.nav-item:nth-child(2){animation-delay:.2s}
.nav-item:nth-child(3){animation-delay:.3s}
.nav-item:nth-child(4){animation-delay:.4s}
.nav-item:nth-child(5){animation-delay:.5s}
@keyframes slideIn{
    to{opacity:1;transform:translateY(0)}
}

/* ===== LINK HOVER ===== */
.nav-link{
    position:relative;
    padding-bottom:4px;
    transition:color .3s;
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
    transition:.3s;
}
.nav-link:hover{color:#d1fae5}
.nav-link:hover::after{width:100%}

/* ===== NAVBAR PAGE PREVIEW ===== */
.nav-preview{
    position:absolute;
    top:110%;
    left:50%;
    transform:translateX(-50%) scale(.9);
    width:260px;
    background:#0f3f3b;
    border-radius:12px;
    box-shadow:0 20px 40px rgba(0,0,0,.4);
    opacity:0;
    pointer-events:none;
    transition:.35s;
    overflow:hidden;
    z-index:100;
}
.nav-preview img{width:100%;height:140px;object-fit:cover}
.nav-preview span{
    display:block;
    padding:10px;
    text-align:center;
    color:#d1fae5;
    font-weight:600;
    font-size:14px;
}
.nav-item:hover .nav-preview{
    opacity:1;
    transform:translateX(-50%) scale(1);
    pointer-events:auto;
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header id="navbar" class="scroll-animate navbar-transparent fixed top-0 left-0 w-full z-50">

<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

<div class="flex items-center gap-3">
<img src="{{ asset('images/logo.png') }}" class="h-14 w-14 object-contain">
<span class="text-white text-2xl font-extrabold tracking-wide">JejakLangkah.id</span>
</div>

<nav class="hidden md:flex items-center gap-8 text-white font-semibold">

<a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'text-yellow-300' : '' }}">
Home
<div class="nav-preview">
<img src="{{ asset('images/preview/home.png') }}">
<span>Beranda JejakLangkah</span>
</div>
</a>

<a href="{{ url('/profil-jejaklangkah') }}" class="nav-item nav-link {{ request()->is('profil-jejaklangkah') ? 'text-yellow-300' : '' }}">
Profil
<div class="nav-preview">
<img src="{{ asset('images/preview/profil.png') }}">
<span>Profil JejakLangkah</span>
</div>
</a>

<a href="{{ url('/galeri-jejaklangkah') }}" class="nav-item nav-link {{ request()->is('galeri-jejaklangkah') ? 'text-yellow-300' : '' }}">
Galeri
<div class="nav-preview">
<img src="{{ asset('images/preview/galeri.png') }}">
<span>Moment</span>
</div>
</a>

<a href="{{ url('/kontak-jejaklangkah') }}" class="nav-item nav-link {{ request()->is('kontak-jejaklangkah') ? 'text-yellow-300' : '' }}">
Kontak
<div class="nav-preview">
<img src="{{ asset('images/preview/kontak.png') }}">
<span>Hubungi Kami</span>
</div>
</a>

<a href="https://wa.me/6281944872700" target="_blank"
class="nav-item ml-6 bg-green-600 hover:bg-green-700 px-5 py-2 rounded-full shadow transition">
Contact Us →
</a>

</nav>

<button id="menuBtn" class="md:hidden text-white text-3xl">☰</button>
</div>

<!-- MOBILE MENU -->
<div id="mobileMenu" class="hidden absolute top-full left-0 w-full bg-[#0f3f3b] z-40
flex flex-col items-center gap-6 py-10 text-white text-xl font-semibold shadow-xl">

<button id="closeBtn" class="absolute top-4 right-6 text-3xl">×</button>

<a href="{{ url('/') }}">Home</a>
<a href="{{ url('/profil-jejaklangkah') }}">Profil</a>
<a href="{{ url('/galeri-jejaklangkah') }}">Galeri</a>
<a href="{{ url('/kontak-jejaklangkah') }}">Kontak</a>

<a href="https://wa.me/6281944872700" target="_blank"
class="bg-green-600 hover:bg-green-700 px-8 py-3 rounded-full shadow transition mt-4">
Contact Us →
</a>
</div>
</header>

<main class="pt-[76px] md:pt-[80px]">
@yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="footer-animate bg-[#0f3d3a] text-white mt-32 relative">

<div class="footer-cta absolute left-1/2 -top-16 transform -translate-x-1/2 bg-green-700 
rounded-2xl px-6 md:px-10 py-6 shadow-xl flex flex-col md:flex-row items-center gap-6 w-[90%] max-w-5xl">

<h3 class="text-base md:text-lg font-bold flex-1 text-center md:text-left">
Mulailah Perjalanan Yang Tak Terlupakan! Jelajahi Permata Tersembunyi JejakLangkah.id
</h3>

<a href="https://wa.me/6281944872700" target="_blank"
class="pulse-btn bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold shadow hover:bg-yellow-300 transition">
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

<script>
// Mobile menu
const menuBtn=document.getElementById('menuBtn');
const closeBtn=document.getElementById('closeBtn');
const mobileMenu=document.getElementById('mobileMenu');
menuBtn.onclick=()=>mobileMenu.classList.remove('hidden');
closeBtn.onclick=()=>mobileMenu.classList.add('hidden');

// Navbar color on scroll
const navbar=document.getElementById('navbar');
window.addEventListener('scroll',()=>{
if(window.scrollY>60){
navbar.classList.add('navbar-colored');
navbar.classList.remove('navbar-transparent');
}else{
navbar.classList.add('navbar-transparent');
navbar.classList.remove('navbar-colored');
}
});

// Scroll reveal
const observer=new IntersectionObserver(entries=>{
entries.forEach(e=>{
if(e.isIntersecting) e.target.classList.add('active');
});
},{threshold:.2});
document.querySelectorAll('.scroll-animate,.footer-animate').forEach(el=>observer.observe(el));
</script>

</body>
</html>
