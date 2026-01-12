@extends('layouts.app')

@section('content')

<style>
/* ===== BASIC ANIM ===== */
.hero-content{
    opacity:0;
    transform:translateY(30px);
    animation:fadeUp 1s ease forwards;
    }

@keyframes fadeUp{
    to{opacity:1;
        transform:translateY(0)}
    }

.dot{transition:.3s}

/* ===== SCROLL REVEAL ===== */
.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:.8s
    }

.reveal.active{
    opacity:1;
    transform:translateY(0)
    }

/* ===== DIVIDER ===== */
.section-divider svg{
    display:block;
    width:100%;
    height:80px
    }

/* ===== HERO CINEMATIC ===== */
.hero-title{
    background:linear-gradient(90deg,#a7f3d0,#22c55e,#a7f3d0);
    -webkit-background-clip:text;
    color:transparent;
    animation:heroGlow 6s linear infinite
    }

@keyframes heroGlow{
    0%{background-position:0%}100%{
        background-position:200%}
    }

.search-float{
    animation:float 4s ease-in-out infinite
    }

@keyframes float{
    0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}
    }

.hero-light{
    position:absolute;
    inset:-50%;
    background:radial-gradient(circle at 30% 30%,rgba(34,197,94,.15),transparent 60%);
    animation:sweep 12s linear infinite
    }

@keyframes sweep{0%{transform:translateX(-20%)}100%{transform:translateX(20%)}
    }

.hero-btn{
    position:relative;
    overflow:hidden
    }

.hero-btn::after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.6),transparent);
    transform:translateX(-120%);
    transition:1s
    }

.hero-btn:hover::after{
    transform:translateX(120%)
    }

.scroll-hint{
    position:absolute;
    bottom:30px;right:30px;
    opacity:.7;
    animation:hint 2s infinite
    }

@keyframes hint{0%,100%{
    transform:translateY(0)}50%{transform:translateY(8px)}
    }

/* ===== CATEGORY ULTRA ===== */
.category-card{
    position:relative;
    perspective:1000px;
    transform-style:preserve-3d;
    transition:.6s;
    animation:pulseIn .9s ease
    }

@keyframes pulseIn{
    0%{opacity:0;
    transform:scale(.92)}60%{opacity:1;
    transform:scale(1.05)}100%{transform:scale(1)}
    }

.category-card::before{
    content:"";
    position:absolute;
    inset:-2px;
    border-radius:1rem;
    background:linear-gradient(120deg,#22c55e,#0ea5e9,#22c55e);
    filter:blur(10px);
    opacity:0;
    transition:.6s;z-index:-1
    }

.category-card:hover::before{
    opacity:1
    }

.category-card::after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.25),transparent);
    transform:translateX(-120%);
    transition:1s
    }

.category-card:hover::after{
    transform:translateX(120%)
    }

.category-card img{transition:.7s}
.category-card:hover img{transform:scale(1.15)}
.category-card span{transition:.5s}
.category-card:hover span{text-shadow:0 10px 25px rgba(0,0,0,.8);
    letter-spacing:1px}

/* ===== INFO BOX ===== */
.info-card{
    position:relative;
    perspective:1000px;
    transition:.6s;
    animation:infoFade .8s ease
    }
@keyframes infoFade{
    from{opacity:0;
    transform:translateY(30px) scale(.95)}to{opacity:1;transform:translateY(0) scale(1)}
    }

.info-card::before{
    content:"";
    position:absolute;
    inset:-2px;border-radius:inherit;
    background:linear-gradient(120deg,#22c55e,#0ea5e9,#22c55e);
    filter:blur(10px);
    opacity:0;
    transition:.6s;
    z-index:-1
    }
    
.info-card:hover::before{opacity:1}
.info-card .icon{transition:.6s}
.info-card:hover .icon{transform:translateY(-6px) scale(1.15) rotate(8deg)}

.bg-soft-gradient{background:linear-gradient(180deg,#f0fdfa 0%,#ffffff 100%)}
.hero-slide{will-change:transform}
</style>

{{-- ================= HERO ================= --}}
<section class="relative min-h-screen overflow-hidden">
<div class="hero-light"></div>

<div id="heroCarousel" class="absolute inset-0">
@php
$heroImages=['images/bg22.jpeg','images/hero.jpg','images/gunung1.jpeg'];
@endphp
@foreach($heroImages as $i=>$img)
<div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 {{ $i==0?'opacity-100':'opacity-0' }}"
style="background-image:url('{{ asset($img) }}')"></div>
@endforeach
</div>

<div class="absolute inset-0 bg-black/70"></div>

<div class="relative z-10 min-h-screen flex items-center px-6">
<div class="max-w-6xl mx-auto text-green-300 hero-content">

<h1 class="hero-title text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
EXPLORE <br> THE WORLD
</h1>

<p class="text-base md:text-lg mb-8 max-w-2xl text-green-200">
Temukan destinasi wisata terbaik dengan tour guide profesional,
rating tinggi, dan sistem booking mudah.
</p>

<form action="{{ route('destinations.index') }}" method="GET"
class="search-float flex items-center w-full max-w-xl mb-10
bg-white rounded-full shadow-lg
px-2 py-1">

<input name="search"
placeholder="Cari destinasi wisata..."
class="flex-1 px-6 py-3 text-gray-700 focus:outline-none bg-transparent">

<button class="hero-btn bg-yellow-400 hover:bg-yellow-500
text-black font-bold px-7 py-2 rounded-full transition">
Cari
</button>
</form>

</div>
</div>

<div class="scroll-hint text-white text-xl">⬇</div>

<div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex gap-3">
<span class="dot w-3 h-3 rounded-full bg-white/40"></span>
<span class="dot w-3 h-3 rounded-full bg-white/40"></span>
<span class="dot w-3 h-3 rounded-full bg-white/40"></span>
</div>
</section>

{{-- ================= INFO BOX ================= --}}
<section class="py-20 px-6 bg-[#f0fdfa] reveal">
<div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">

<a href="{{ route('destinations.index') }}"
class="info-card bg-[#0f3f3b] border border-green-500 rounded-2xl flex items-center gap-4 px-6 py-5">
<div class="icon w-14 h-14 rounded-full bg-green-600 flex items-center justify-center text-white">📍</div>
<div>
<p class="text-xl font-bold text-green-300">50+ Destinasi Wisata</p>
<p class="text-sm text-green-200">Pilihan terbaik di NTB</p>
</div>
</a>

<a href="{{ route('guides.index') }}"
class="info-card bg-[#0f3f3b] border border-green-500 rounded-2xl flex items-center gap-4 px-6 py-5">
<div class="icon w-14 h-14 rounded-full bg-green-600 flex items-center justify-center text-white">🧭</div>
<div>
<p class="text-lg font-bold text-green-300">Guide Profesional</p>
<p class="text-sm text-green-200">Berpengalaman & terpercaya</p>
</div>
</a>

</div>
</section>

<div class="section-divider">
<svg viewBox="0 0 1440 80" preserveAspectRatio="none">
<path fill="#ffffff" d="M0,40 C240,80 480,0 720,20 960,40 1200,60 1440,20 L1440,0 L0,0 Z"></path>
</svg>
</div>

{{-- ================= INTRO ================= --}}
<section class="bg-soft-gradient py-24 px-6 reveal">
<div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">

<div>
<h2 class="text-4xl font-extrabold text-teal-700 leading-tight">
Destinasi Wisata <br> NTB
</h2>
</div>

<div>
<p class="text-gray-600 text-lg leading-relaxed">
Jelajahi berbagai destinasi wisata pilihan mulai dari pantai eksotis,
pegunungan indah, air terjun alami, hingga wisata budaya dan religi.
</p>
</div>

</div>
</section>

<div class="section-divider">
<svg viewBox="0 0 1440 80" preserveAspectRatio="none">
<path fill="#f3f4f6" d="M0,20 C360,60 720,20 1080,40 1260,55 1380,40 1440,20 L1440,0 L0,0 Z"></path>
</svg>
</div>

{{-- ================= KATEGORI ================= --}}
<section class="bg-[#f3f4f6] py-20 px-6 reveal">
<h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
Kategori Wisata
</h2>

@php
$categories=[
'pantai'=>'pantai1.jpg',
'wisata-alam'=>'alam.jpeg',
'pegunungan-bukit'=>'gunung.jpeg',
'wisata-tradisional'=>'sade.png',
'wisata-religi'=>'wisata religi.jpeg'
];
@endphp

<div class="grid grid-cols-2 md:grid-cols-5 gap-6 max-w-7xl mx-auto">

@foreach($categories as $slug=>$image)
<a href="{{ route('destinations.index',['category'=>$slug]) }}"
class="category-card relative rounded-2xl overflow-hidden shadow-lg group">

<img src="{{ asset('images/categories/'.$image) }}"
class="h-40 md:h-48 w-full object-cover">

<div class="absolute inset-0 bg-black/40 flex items-center justify-center">
<span class="text-white text-lg md:text-2xl font-bold capitalize">
{{ str_replace('-',' ',$slug) }}
</span>
</div>

</a>
@endforeach

</div>
</section>

<script>
// === HERO SLIDER ===
const slides=document.querySelectorAll('.hero-slide');
const dots=document.querySelectorAll('.dot');
let current=0;dots[0].classList.add('bg-white');
setInterval(()=>{
slides[current].classList.replace('opacity-100','opacity-0');
dots[current].classList.remove('bg-white');
current=(current+1)%slides.length;
slides[current].classList.replace('opacity-0','opacity-100');
dots[current].classList.add('bg-white');
},2500);

// === SCROLL REVEAL ===
const reveals=document.querySelectorAll('.reveal');
window.addEventListener('scroll',()=>reveals.forEach(el=>{
if(el.getBoundingClientRect().top < window.innerHeight-100) el.classList.add('active');
}));

// === PARALLAX HERO ===
window.addEventListener('scroll',()=>{
const scrolled=window.scrollY;
document.querySelectorAll('.hero-slide').forEach(slide=>{
slide.style.transform=`translateY(${scrolled*0.25}px)`;
});
});

// === 3D TILT CATEGORY ===
document.querySelectorAll('.category-card').forEach(card=>{
card.addEventListener('mousemove',e=>{
const r=card.getBoundingClientRect();
const x=e.clientX-r.left,y=e.clientY-r.top;
const rx=-(y-r.height/2)/15,ry=(x-r.width/2)/15;
card.style.transform=`rotateX(${rx}deg) rotateY(${ry}deg) scale(1.05)`;
});
card.addEventListener('mouseleave',()=>card.style.transform='rotateX(0) rotateY(0) scale(1)');
});

// === 3D TILT INFO ===
document.querySelectorAll('.info-card').forEach(card=>{
card.addEventListener('mousemove',e=>{
const r=card.getBoundingClientRect();
const x=e.clientX-r.left,y=e.clientY-r.top;
const rx=-(y-r.height/2)/20,ry=(x-r.width/2)/20;
card.style.transform=`rotateX(${rx}deg) rotateY(${ry}deg) scale(1.03)`;
});
card.addEventListener('mouseleave',()=>card.style.transform='rotateX(0) rotateY(0) scale(1)');
});
</script>

@endsection
