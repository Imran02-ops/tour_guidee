@extends('layouts.app')

@php
$heroImages = [
    'Pantai' => 'pantai1.jpg',
    'Pegunungan Bukit' => 'gunung3.jpeg',
    'Wisata Alam' => 'alam.jpeg',
    'Wisata Religi' => 'sade.png',
    'Wisata Tradisional' => 'wisata religi.jpeg',
    'Semua' => 'hero1.jpg'
];

$carouselImages = ['hero.jpg','gunung1.jpeg','alam.jpeg'];

$descriptions = [
    'Pantai' => 'Nikmati keindahan pantai dengan pasir putih, ombak yang tenang, dan panorama laut biru yang memanjakan mata.',
    'Pegunungan Bukit' => 'Jelajahi udara sejuk pegunungan dengan panorama perbukitan yang menenangkan jiwa dan pikiran.',
    'Wisata Alam' => 'Temukan pesona alam mulai dari air terjun, hutan hijau, hingga danau eksotis yang memesona.',
    'Wisata Religi' => 'Kunjungi destinasi religi penuh nilai sejarah, spiritual, dan budaya yang mendalam.',
    'Wisata Tradisional' => 'Rasakan kekayaan budaya lokal melalui desa adat, kerajinan, dan tradisi masyarakat setempat.',
    'Semua' => 'Temukan beragam destinasi wisata terbaik di Nusa Tenggara Barat yang siap memberikan pengalaman tak terlupakan.'
];

$active = ucwords(str_replace('-', ' ', $activeCategory ?? 'Semua'));
$heroImage = $heroImages[$active] ?? $heroImages['Semua'];
$desc = $descriptions[$active] ?? $descriptions['Semua'];
@endphp

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative h-[420px] sm:h-[520px] md:h-[620px] overflow-hidden">

@if($active === 'Semua')
<div class="absolute inset-0 hero-carousel">
    @foreach($carouselImages as $img)
        <div class="carousel-slide" style="background-image:url('{{ asset('images/hero/'.$img) }}')"></div>
    @endforeach
</div>
@else
<div class="absolute inset-0" style="background-image:url('{{ asset('images/hero/'.$heroImage) }}'); background-size:cover; background-position:center;"></div>
@endif

<div class="absolute inset-0 bg-black/40"></div>
<div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-gray-100 via-gray-100/70 to-transparent"></div>

<div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
<div class="backdrop-blur-xl bg-white/30 rounded-2xl sm:rounded-3xl px-6 py-8 sm:px-14 sm:py-14 max-w-xl sm:max-w-4xl shadow-xl animate-fadeIn">

<h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-white mb-3 sm:mb-4 leading-tight">
{{ $active === 'Semua' ? 'Semua Destinasi Wisata' : $active }}
</h1>

<p class="text-white/90 text-sm sm:text-lg max-w-md sm:max-w-2xl mx-auto">
{{ $desc }}
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

<section class="bg-gray-100 pt-10 pb-6">
<div class="max-w-7xl mx-auto px-4 sm:px-6">
<div class="flex md:justify-center gap-8 mb-10 overflow-x-auto md:overflow-visible px-2 md:px-0 scrollbar-hide">

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
<div class="max-w-7xl mx-auto px-4 sm:px-6">

@if($destinations->count())
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 sm:gap-6 md:gap-8">

@foreach($destinations as $d)
<div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition overflow-hidden transform hover:-translate-y-2 duration-500 group">

<a href="{{ route('destinations.show',$d->id) }}">
<div class="relative overflow-hidden">
<img 
    src="{{ asset('storage/'.$d->image) }}" 
    loading="lazy"
    decoding="async"
    width="400" height="300"
    class="h-36 sm:h-44 md:h-48 w-full object-cover group-hover:scale-110 transition duration-700">
<div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition"></div>
</div>

<div class="p-4 sm:p-5">
<h3 class="font-bold text-base sm:text-lg mb-1">{{ $d->name }}</h3>
<p class="text-xs sm:text-sm text-gray-500">{{ $d->location }}</p>
</div>
</a>

@if($manageMode)
<div class="flex justify-end gap-2 px-4 sm:px-5 pb-4 sm:pb-5">
<button onclick="openEditModal({{ $d }});" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-full">Ubah</button>

<form action="{{ route('destinations.destroy',$d->id) }}" method="POST" onsubmit="return confirm('Yakin hapus destinasi ini?')">
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
.filter-item{display:flex;flex-direction:column;align-items:center;gap:.4rem;color:#9ca3af;transition:.3s;min-width:70px}
.filter-item i{font-size:2.2rem}
.filter-item:hover,.filter-item.active{color:#0f766e}
.filter-item.active i{transform:scale(1.25)}
.filter-item .underline{height:3px;width:0;background:#0f766e;border-radius:999px;transition:.3s}
.filter-item.active .underline{width:100%}

@keyframes fadeIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.animate-fadeIn{animation:fadeIn 1s ease}

.hero-carousel{position:absolute;inset:0;overflow:hidden}
.carousel-slide{
    position:absolute;inset:0;
    background-size:cover;background-position:center;
    opacity:0;
    animation:slideShow 18s infinite;
}
.carousel-slide:nth-child(1){animation-delay:0s}
.carousel-slide:nth-child(2){animation-delay:6s}
.carousel-slide:nth-child(3){animation-delay:12s}

@keyframes slideShow{
    0%{opacity:0}
    10%{opacity:1}
    30%{opacity:1}
    40%{opacity:0}
    100%{opacity:0}
}

/* ===== Mobile Optimizer ===== */
@media (max-width:640px){
    .filter-item i{font-size:1.7rem}
    .filter-item span{font-size:.8rem}
}

/* hide scrollbar */
.scrollbar-hide::-webkit-scrollbar{display:none}
.scrollbar-hide{-ms-overflow-style:none;scrollbar-width:none}
</style>

@endsection
