@extends('layouts.app')

@section('content')

{{-- ================= HEADER ================= --}}
<section class="relative bg-cover bg-center min-h-[320px]"
style="background-image:url('{{ asset('images/gggg.png') }}')">
<div class="absolute inset-0 bg-black/60"></div>

<div class="relative z-10 flex items-center justify-center min-h-[320px] px-6">
<div class="backdrop-blur-xl bg-white/20 rounded-3xl px-10 py-10 text-center max-w-6xl w-full animate-fadeIn">
<h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3">
Semua Destinasi Wisata
</h1>
<p class="text-white/80">Temukan pengalaman wisata terbaik di NTB</p>
</div>
</div>
</section>

{{-- ================= BODY ================= --}}
<section class="bg-gray-100 py-16">
<div class="max-w-7xl mx-auto px-6">

{{-- ===== ICON FILTER ===== --}}
@php
$iconMap = [
'Pantai' => 'bx-water',
'Pegunungan Bukit' => 'bx-mountain',
'Wisata Alam' => 'bx-leaf',
'Wisata Religi' => 'bx-mosque',
'Wisata Tradisional' => 'bx-home-heart'
];
@endphp

<div class="flex justify-center gap-12 mb-16 animate-slideUp">

{{-- SEMUA --}}
<a href="{{ route('destinations.index') }}" class="filter-item {{ empty($activeCategory) ? 'active' : '' }}">
<i class='bx bx-grid-alt'></i>
<span>Semua</span>
<div class="underline"></div>
</a>

@foreach($categories as $cat)
@php
$label = ucwords(str_replace('-', ' ', $cat));
$icon  = $iconMap[$label] ?? 'bx-map';
$active = $activeCategory === $cat;
@endphp

<a href="{{ route('destinations.index',['category'=>$cat]) }}"
class="filter-item {{ $active ? 'active' : '' }}">
<i class='bx {{ $icon }}'></i>
<span>{{ $label }}</span>
<div class="underline"></div>
</a>
@endforeach

</div>

{{-- ===== KATALOG ===== --}}
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
<button onclick="openEditModal({{ $d }});"
class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-full">Ubah</button>

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
.filter-item{
display:flex;
flex-direction:column;
align-items:center;
gap:.4rem;
position:relative;
color:#9ca3af;
transition:.3s;
}
.filter-item i{font-size:2.2rem;}
.filter-item:hover{color:#0f766e;}
.filter-item.active{color:#0f766e;}
.filter-item.active i{transform:scale(1.25);}
.filter-item .underline{
height:3px;
width:0;
background:#0f766e;
border-radius:999px;
transition:.3s;
}
.filter-item.active .underline{
width:100%;
}

@keyframes fadeIn{
from{opacity:0; transform:translateY(20px);}
to{opacity:1; transform:translateY(0);}
}
.animate-fadeIn{animation:fadeIn 1s ease;}

@keyframes slideUp{
from{opacity:0; transform:translateY(30px);}
to{opacity:1; transform:translateY(0);}
}
.animate-slideUp{animation:slideUp .8s ease;}

@keyframes scaleUp{
from{opacity:0; transform:scale(.9);}
to{opacity:1; transform:scale(1);}
}
.animate-scaleUp{animation:scaleUp .7s ease;}
</style>

@endsection
