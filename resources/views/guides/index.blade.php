@extends('layouts.app')
@section('content')

<style>
/* ================= GLOBAL EFFECT ================= */
.page-fade{animation:pageFade 1s ease forwards}
@keyframes pageFade{from{opacity:0;transform:translateY(40px)}to{opacity:1;transform:translateY(0)}}

.reveal{opacity:0;transform:translateY(50px);transition:.8s}
.reveal.active{opacity:1;transform:translateY(0)}

.hero-bg{
    position:absolute; inset:0;
    background-size:cover;
    background-position:center;
    animation:bgSlide 18s infinite alternate;
    z-index:-1;
}
@keyframes bgSlide{
    0%{background-image:url('{{ asset('images/bg22.jpeg') }}')}
    33%{background-image:url('{{ asset('images/gggg.png') }}')}
    66%{background-image:url('{{ asset('images/categories/pantai1.jpg') }}')}
    100%{background-image:url('{{ asset('images/categories/alam.jpeg') }}')}
}

/* ================= GUIDE CARD ================= */
.guide-card{transition:.4s}
.guide-card:hover{transform:translateY(-10px) scale(1.03);box-shadow:0 25px 50px rgba(0,0,0,.15)}

.guide-photo img{transition:.5s}
.guide-card:hover img{transform:scale(1.15)}

.guide-photo{position:relative}
.guide-photo::after{
    content:'';
    position:absolute;inset:-6px;border-radius:999px;
    border:3px solid rgba(255,80,80,.5);
    animation:pulse 2s infinite
}
@keyframes pulse{0%,100%{opacity:.5}50%{opacity:1}}

.breath{animation:breath 2s infinite}
@keyframes breath{0%,100%{transform:scale(1)}50%{transform:scale(1.06)}}
</style>

<!-- ================= HERO BACKGROUND ================= -->
<div class="relative min-h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-black/50"></div>
    <h1 class="relative text-white text-4xl md:text-5xl font-extrabold">
        Guide Profesional <span class="text-teal-300">JejakLangkah.id</span>
    </h1>
</div>

<!-- ================= GUIDE LIST ================= -->
<div class="max-w-7xl mx-auto px-6 py-24 page-fade">

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

@foreach($guides as $id => $g)
<div class="bg-white rounded-2xl shadow-xl p-6 text-center guide-card reveal">

<div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-4 border-4 border-red-300 guide-photo">
<img src="{{ asset($g['photo']) }}" class="w-full h-full object-cover">
</div>

<h3 class="text-lg font-bold">{{ $g['name'] }}</h3>
<p class="text-xs text-gray-500">📞 +{{ $g['phone'] }}</p>
<p class="text-sm text-gray-600 mb-4">{{ $g['specialty'] }}</p>

<div class="flex gap-2">
<button onclick="openModal('{{ asset($g['photo']) }}','{{ $g['name'] }}','{{ $g['phone'] }}','{{ $g['specialty'] }}','{{ route('guides.show',$id) }}')"
class="flex-1 bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg text-xs font-semibold">
DETAIL
</button>

<a href="https://wa.me/{{ $g['phone'] }}?text=Halo,%20saya%20ingin%20booking%20guide%20{{ urlencode($g['name']) }}"
target="_blank"
class="flex-1 bg-lime-400 hover:bg-lime-500 text-white py-2 rounded-lg text-xs font-semibold breath">
BOOKING
</a>
</div>

</div>
@endforeach

</div>
</div>

<!-- ================= MODAL ================= -->
<div id="guideModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center">
<div id="modalCard" class="bg-white w-[92%] max-w-md rounded-3xl shadow-2xl p-8 relative transform scale-90 opacity-0 transition-all duration-500">

<button onclick="closeModal()" class="absolute top-4 right-5 text-2xl text-gray-500 hover:text-black">×</button>

<div class="w-44 h-44 mx-auto rounded-full overflow-hidden border-4 border-teal-400 mb-5">
<img id="modalPhoto" class="w-full h-full object-cover">
</div>

<h3 id="modalName" class="text-2xl font-bold text-center"></h3>
<p id="modalPhone" class="text-center text-gray-500 mt-1"></p>
<p id="modalSpec" class="text-center text-gray-600 mt-3 mb-6"></p>

<div class="flex gap-4">
<a id="modalDetail" class="flex-1 bg-green-700 text-white py-2 rounded-lg text-center font-semibold hover:bg-green-800">DETAIL</a>
<a id="modalBooking" target="_blank" class="flex-1 bg-lime-400 text-white py-2 rounded-lg text-center font-semibold hover:bg-lime-500">BOOKING</a>
</div>

</div>
</div>

<script>
// Scroll reveal
const cards=document.querySelectorAll('.reveal');
const obs=new IntersectionObserver(entries=>{
entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('active')});
},{threshold:.2});
cards.forEach(c=>obs.observe(c));

// Modal logic
const modal=document.getElementById('guideModal');
const card=document.getElementById('modalCard');

function openModal(photo,name,phone,spec,detail){
document.getElementById('modalPhoto').src=photo;
document.getElementById('modalName').innerText=name;
document.getElementById('modalPhone').innerText='📞 +'+phone;
document.getElementById('modalSpec').innerText=spec;
document.getElementById('modalDetail').href=detail;
document.getElementById('modalBooking').href=`https://wa.me/${phone}?text=Halo,%20saya%20ingin%20booking%20guide%20${encodeURIComponent(name)}`;

modal.classList.remove('hidden');
modal.classList.add('flex');
setTimeout(()=>{card.classList.remove('scale-90','opacity-0');card.classList.add('scale-100','opacity-100')},50);
}

function closeModal(){
card.classList.remove('scale-100','opacity-100');
card.classList.add('scale-90','opacity-0');
setTimeout(()=>{modal.classList.add('hidden');modal.classList.remove('flex')},400);
}
modal.addEventListener('click',e=>{if(e.target===modal)closeModal()});
</script>

@endsection
