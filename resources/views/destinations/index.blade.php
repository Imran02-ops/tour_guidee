@extends('layouts.app')

@php
$heroImages = [
'Pantai' => ['pantai1.jpg','pantai2.jpeg','pantai3.jpeg'],
'Pegunungan Bukit' => ['gunung1.jpeg','gunung2.jpeg','gunung3.jpeg'],
'Wisata Alam' => ['alam1.jpg','alam2.jpg','alam3.jpg'],
'Wisata Religi' => ['religi1.jpg','religi2.jpg','religi3.jpg'],
'Wisata Tradisional' => ['tradisi1.jpg','tradisi2.jpg','tradisi3.jpg'],
'Semua' => ['hero1.jpg','hero2.jpg','hero3.jpg']
];

$active = ucwords(str_replace('-', ' ', $activeCategory ?? 'Semua'));
$images = $heroImages[$active] ?? $heroImages['Semua'];
@endphp

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative h-[520px] md:h-[600px] overflow-hidden">
<div id="heroWrapper" class="absolute inset-0">
@foreach($images as $i => $img)
<div class="hero-slide {{ $i === 0 ? 'active' : '' }}"
style="background-image:url('{{ asset('images/hero/'.$img) }}')"></div>
@endforeach
</div>

<div class="absolute inset-0 bg-black/50"></div>

{{-- Gradient Vignette --}}
<div class="absolute bottom-0 left-0 w-full h-40
bg-gradient-to-t from-gray-100 via-gray-100/70 to-transparent"></div>

<div class="relative z-10 h-full flex items-center justify-center text-center px-6">
<div class="backdrop-blur-xl bg-white/20 rounded-3xl px-10 py-10 max-w-4xl">

<h1 id="heroTitle" class="text-4xl md:text-5xl font-extrabold text-white mb-3 opacity-0">
{{ $active === 'Semua' ? 'Semua Destinasi Wisata' : $active }}
</h1>

<p id="heroSub" class="text-white/80 opacity-0">
Temukan pengalaman wisata terbaik di NTB
</p>

</div>
</div>
</section>

{{-- ================= FILTER ICON ================= --}}
@php
$iconMap = [
'Pantai' => 'bx-water',
'Pegunungan Bukit' => 'bx-mountain',
'Wisata Alam' => 'bx-leaf',
'Wisata Religi' => 'bx-mosque',
'Wisata Tradisional' => 'bx-home-heart'
];
@endphp

<section class="bg-gray-100 pt-12 pb-6">
<div class="max-w-7xl mx-auto px-6">

<div class="flex justify-center gap-12 mb-10 animate-slideUp">

<a href="{{ route('destinations.index') }}" class="filter-item {{ empty($activeCategory) ? 'active' : '' }}">
<i class='bx bx-grid-alt'></i>
<span>Semua</span>
<div class="underline"></div>
</a>

@foreach($categories as $cat)
@php
$label = ucwords(str_replace('-', ' ', $cat));
$icon  = $iconMap[$label] ?? 'bx-map';
@endphp

<a href="{{ route('destinations.index',['category'=>$cat]) }}"
class="filter-item {{ $activeCategory === $cat ? 'active' : '' }}">
<i class='bx {{ $icon }}'></i>
<span>{{ $label }}</span>
<div class="underline"></div>
</a>
@endforeach

</div>
</div>
</section>

{{-- ================= KATALOG ================= --}}
<section class="bg-gray-100 pb-16">
<div class="max-w-7xl mx-auto px-6">

@if($destinations->count())

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8">

@foreach($destinations as $d)
<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition overflow-hidden
transform hover:-translate-y-2 duration-500 group animate-scaleUp">

<a href="{{ route('destinations.show',$d->id) }}">
<div class="relative overflow-hidden">
<img src="{{ asset('storage/'.$d->image) }}"
class="h-48 w-full object-cover group-hover:scale-110 transition duration-700">
<div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition"></div>
</div>

<div class="p-5">
<h3 class="font-bold text-lg mb-1">{{ $d->name }}</h3>
<p class="text-sm text-gray-500">{{ $d->location }}</p>
</div>
</a>

@if($manageMode)
<div class="flex justify-end gap-2 px-5 pb-5">
<button onclick="openEditModal({{ $d }});" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-full">Ubah</button>

<form action="{{ route('destinations.destroy',$d->id) }}" method="POST"
onsubmit="return confirm('Yakin hapus destinasi ini?')">
@csrf @method('DELETE')
<button class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded-full">Hapus</button>
</form>
</div>
@endif
</div>
@endforeach
</div>

<div class="mt-12 flex justify-end">
{{ $destinations->links() }}
</div>

@else
<p class="text-center text-gray-500">Destinasi tidak ditemukan.</p>
@endif

</div>
</section>

{{-- ================= STYLE ================= --}}
<style>
.hero-slide{
position:absolute; inset:0;
background-size:cover;
background-position:center;
opacity:0;
filter:blur(10px);
transition:opacity 1.5s ease, filter 1.5s ease;
}
.hero-slide.active{
opacity:1;
filter:blur(0);
z-index:2;
}

.filter-item{display:flex;flex-direction:column;align-items:center;gap:.4rem;position:relative;color:#9ca3af;transition:.3s;}
.filter-item i{font-size:2.2rem;}
.filter-item:hover{color:#0f766e;}
.filter-item.active{color:#0f766e;}
.filter-item.active i{transform:scale(1.25);}
.filter-item .underline{height:3px;width:0;background:#0f766e;border-radius:999px;transition:.3s;}
.filter-item.active .underline{width:100%;}

@keyframes slideUp{from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);}}
.animate-slideUp{animation:slideUp .8s ease;}

@keyframes scaleUp{from{opacity:0;transform:scale(.9);}to{opacity:1;transform:scale(1);}}
.animate-scaleUp{animation:scaleUp .7s ease;}
</style>

{{-- ================= SCRIPT ================= --}}
<script>
let slides = document.querySelectorAll('.hero-slide');
let current = 0;

setInterval(() => {
slides[current].classList.remove('active');
current = (current + 1) % slides.length;
slides[current].classList.add('active');
}, 4500);

// === TEXT WORD ANIMATION ===
function animateText(el){
const words = el.innerText.split(' ');
el.innerHTML = '';
words.forEach((word,i)=>{
let span = document.createElement('span');
span.innerText = word + ' ';
span.style.opacity = 0;
span.style.transition = 'all .6s ease';
span.style.display = 'inline-block';
span.style.transform = 'translateY(10px)';
el.appendChild(span);

setTimeout(()=>{
span.style.opacity = 1;
span.style.transform = 'translateY(0)';
}, i * 120);
});
}

window.addEventListener('load',()=>{
animateText(document.getElementById('heroTitle'));
animateText(document.getElementById('heroSub'));
});
</script>

@endsection
