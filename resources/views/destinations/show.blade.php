@extends('layouts.app')

@section('content')

<div id="overlay"
class="fixed inset-0 z-50 bg-black/60 backdrop-blur-md
flex items-center justify-center px-4">

<div id="modal"
class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900
rounded-3xl shadow-2xl w-full max-w-6xl overflow-hidden
grid grid-cols-1 md:grid-cols-2 animate-zoomIn">

{{-- IMAGE --}}
<div class="relative overflow-hidden group">
<img src="{{ asset('storage/'.$destination->image) }}"
class="w-full h-[520px] object-cover transition duration-700 group-hover:scale-105">
<div class="absolute inset-0 bg-black/20"></div>
</div>

{{-- INFO --}}
<div class="p-8 md:p-10 text-white flex flex-col justify-between">

<div>
<div class="flex items-start justify-between mb-4">
<h2 class="text-4xl font-extrabold leading-tight">
{{ $destination->name }}
</h2>

<a href="{{ route('destinations.index') }}"
class="w-10 h-10 flex items-center justify-center rounded-full
bg-white/10 hover:bg-white/20 transition text-xl">✕</a>
</div>

<span class="inline-block mb-3 bg-teal-600/90 text-white text-sm px-4 py-1 rounded-full">
{{ ucwords(str_replace('-', ' ', $destination->category)) }}
</span>

<p class="text-gray-300 mb-4">📍 {{ $destination->location }}</p>

<p class="text-gray-100 leading-relaxed mb-6">
{{ $destination->description }}
</p>

<p class="text-2xl font-bold text-teal-400 mb-6">
Rp {{ number_format($destination->price,0,',','.') }}
</p>

{{-- MAP --}}
<div class="rounded-xl overflow-hidden shadow-lg border border-white/10">
<iframe
src="https://www.google.com/maps?q={{ urlencode($destination->location) }}&output=embed"
class="w-full h-48" style="border:0;" allowfullscreen loading="lazy"></iframe>
</div>
</div>

{{-- NAV --}}
<div class="flex items-center justify-between pt-6 border-t border-white/10">

@if($prev)
<a href="{{ route('destinations.show',$prev->id) }}" 
class="nav-btn slide-prev">← Prev</a>
@else <div></div> @endif

<div class="text-sm text-white/50">{{ $index }} / {{ $total }}</div>

@if($next)
<a href="{{ route('destinations.show',$next->id) }}" 
class="nav-btn slide-next">Next →</a>
@endif

</div>
</div>
</div>
</div>

<style>
@keyframes zoomIn{
from{opacity:0; transform:scale(.9) translateY(20px);}
to{opacity:1; transform:scale(1) translateY(0);}
}
.animate-zoomIn{animation:zoomIn .6s ease forwards;}

@keyframes slideNext{
from{transform:translateX(40px); opacity:0;}
to{transform:translateX(0); opacity:1;}
}
@keyframes slidePrev{
from{transform:translateX(-40px); opacity:0;}
to{transform:translateX(0); opacity:1;}
}
.animate-slideNext{animation:slideNext .5s ease;}
.animate-slidePrev{animation:slidePrev .5s ease;}

.nav-btn{
padding:.6rem 1.2rem;
border-radius:999px;
background:rgba(255,255,255,.12);
transition:.3s; font-weight:600;
}
.nav-btn:hover{background:rgba(255,255,255,.25);}
</style>

<script>
document.addEventListener('keydown',e=>{
if(e.key==='Escape') location.href="{{ route('destinations.index') }}";
});

document.querySelectorAll('.slide-next').forEach(btn=>{
btn.addEventListener('click',e=>{
e.preventDefault();
const m=document.getElementById('modal');
m.classList.add('animate-slideNext');
setTimeout(()=>location.href=btn.href,250);
});
});

document.querySelectorAll('.slide-prev').forEach(btn=>{
btn.addEventListener('click',e=>{
e.preventDefault();
const m=document.getElementById('modal');
m.classList.add('animate-slidePrev');
setTimeout(()=>location.href=btn.href,250);
});
});

/* SWIPE */
let startX=0;
const modal=document.getElementById('modal');
modal.addEventListener('touchstart',e=>startX=e.touches[0].clientX);
modal.addEventListener('touchend',e=>{
let endX=e.changedTouches[0].clientX;
if(endX-startX>80 && "{{ $prev?->id }}") location.href="{{ $prev ? route('destinations.show',$prev->id) : '#' }}";
if(startX-endX>80 && "{{ $next?->id }}") location.href="{{ $next ? route('destinations.show',$next->id) : '#' }}";
});
</script>

@endsection
