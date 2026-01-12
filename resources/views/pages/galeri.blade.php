@extends('layouts.app')

@section('content')

{{-- ================= HERO GALERI ================= --}}
<section class="relative w-full h-[220px] sm:h-[260px] md:h-[340px]">
    <img src="{{ asset('images/gggg.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="Hero">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative h-full flex items-center justify-center px-4">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold tracking-wide text-center">
            Galeri JejakLangkah.id
        </h1>
    </div>
</section>

{{-- ================= GALERI FOTO ================= --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">

@php
$photos = [
    ['file'=>'1.jpg','place'=>'Gunung Rinjani','location'=>'Lombok, NTB','desc'=>'Puncak tertinggi di Lombok dengan view Segara Anak yang ikonik.'],
    ['file'=>'2.jpg','place'=>'Gunung Tambora','location'=>'Dompu, NTB','desc'=>'Gunung dengan kaldera terbesar di Indonesia.'],
    ['file'=>'3.jpg','place'=>'Gunung Rinjani','location'=>'Lombok, NTB','desc'=>'Puncak tertinggi di Lombok dengan view Segara Anak yang ikonik.'],
    ['file'=>'4.jpg','place'=>'Savana Propok','location'=>'Sembalun, Lombok Timur','desc'=>'Hamparan luas savana dengan view Rinjani.'],
    ['file'=>'5.jpg','place'=>'Bukit Pergasingan','location'=>'Sembalun, Lombok Timur','desc'=>'Spot sunrise dengan view petak sawah yang cantik dari atas bukit.'],
    ['file'=>'6.jpg','place'=>'Gunung Tambora','location'=>'Dompu, NTB','desc'=>'Gunung dengan kaldera terbesar di Indonesia.'],
    ['file'=>'7.jpg','place'=>'Air Terjun Tiu Kelep','location'=>'Senaru, Lombok Utara','desc'=>'Air terjun yg terletak dibawah jalur pendakian Rinjani via Senaru.'],
    ['file'=>'8.jpg','place'=>'Gunung Tambora','location'=>'Dompu, NTB','desc'=>'Gunung dengan kaldera terbesar di Indonesia.'],
    ['file'=>'9.jpg','place'=>'Air Terjun Torean','location'=>'Torean, Lombok Utara','desc'=>'Air terjun yg terletak dibawah jalur pendakian Rinjani via Torean dengan view bukit.'],
    ['file'=>'10.jpg','place'=>'Gunung Tambora','location'=>'Dompu, NTB','desc'=>'Gunung dengan kaldera terbesar di Indonesia.'],
    ['file'=>'11.jpg','place'=>'Post 4 Gunung Tambora','location'=>'Dompu, NTB','desc'=>'Gunung legendaris dengan kaldera luas dan jalur pendakian menantang.'],
    ['file'=>'12.jpg','place'=>'Sesaot','location'=>'Lombok Barat','desc'=>'Pemandian alami yang masih asri dan air yang sangat dingin.'],
    ['file'=>'13.jpg','place'=>'Islamic Center','location'=>'Mataram, NTB','desc'=>'Masjid terbesar di NTB.'],
    ['file'=>'14.jpg','place'=>'Pantai Batas Senja 2','location'=>'Jempong, Mataram','desc'=>'Pantai wisata klasik dengan sunset dan banyak pilihan kuliner.'],
    ['file'=>'15.jpg','place'=>'Pantai PLN','location'=>'Ampenan, Mataram','desc'=>'Pantai dengan Ikon dermaga tempat singgah kapal dan di bibir pantai terdapat kantor PLN.'],
];
@endphp

<div class="gallery grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 sm:gap-6">
@foreach($photos as $i => $p)
    <button
        type="button"
        class="gallery-item rounded-xl overflow-hidden shadow-lg aspect-[3/4] bg-gray-200 text-left"
        data-index="{{ $i }}"
        data-place="{{ $p['place'] }}"
        data-location="{{ $p['location'] }}"
        data-desc="{{ $p['desc'] }}"
        data-src="{{ asset('images/gallery/'.$p['file']) }}"
        aria-label="Buka preview {{ $p['place'] }}"
    >
        <img
            src="{{ asset('images/gallery/'.$p['file']) }}"
            class="gallery-img w-full h-full object-cover"
            alt="{{ $p['place'] }}"
            loading="lazy"
        >
        <div class="place-preview"></div>
    </button>
@endforeach
</div>

</section>

{{-- ================= MODAL PREVIEW ================= --}}
<div id="galleryModal" class="modal hidden" aria-hidden="true">
    <div class="modal-backdrop"></div>

    <div class="modal-dialog" role="dialog" aria-modal="true" aria-label="Preview galeri">
        {{-- Close --}}
        <button type="button" class="modal-close" id="modalClose" aria-label="Tutup">✕</button>

        {{-- Image Area --}}
        <div class="modal-body">
            <div class="modal-image-wrap">
                <img id="modalImage" src="" alt="" class="modal-image">
            </div>

            {{-- Detail / Slider Info --}}
            <div class="modal-info">
                <div class="modal-title" id="modalTitle">-</div>
                <div class="modal-loc" id="modalLoc">-</div>
                <div class="modal-desc" id="modalDesc">-</div>

                <div class="modal-actions">
                    <button type="button" class="modal-nav" id="modalPrev" aria-label="Sebelumnya">← Prev</button>
                    <div class="modal-counter" id="modalCounter">1 / 1</div>
                    <button type="button" class="modal-nav" id="modalNext" aria-label="Berikutnya">Next →</button>
                </div>
                <div class="modal-hint">Tips: gunakan tombol <b>←</b> <b>→</b> di keyboard, atau <b>ESC</b> untuk tutup.</div>
            </div>
        </div>
    </div>
</div>

{{-- ================= STYLES ================= --}}
<style>
/* ---------- HOVER PREVIEW ---------- */
.gallery-item{
    position:relative;
    cursor:pointer;
    transition:0.35s ease;
    outline:none;
}
.gallery-item:hover{ z-index: 5; }

/* Hover blur others */
.gallery:hover .gallery-item{
    filter: blur(3px) brightness(0.7);
}
.gallery:hover .gallery-item:hover{
    filter: blur(0) brightness(1);
}

/* Parallax zoom base */
.gallery-img{
    width:100%;
    height:100%;
    transform: scale(1);
    transition: transform .45s ease;
    will-change: transform;
}
.gallery-item:hover .gallery-img{
    transform: scale(1.12);
}

/* Bottom label */
.place-preview{
    position:absolute;
    left:0; right:0; bottom:0;
    padding:10px 12px;
    background: linear-gradient(to top, rgba(0,0,0,0.75), transparent);
    color:#fff;
    font-size:13px;
    font-weight:700;
    letter-spacing:.3px;
    opacity:0;
    transform: translateY(100%);
    transition: .35s ease;
    pointer-events:none;
}
.gallery-item:hover .place-preview{
    opacity:1;
    transform: translateY(0);
}

/* ---------- MODAL ---------- */
.modal.hidden{ display:none; }
.modal{
    position:fixed;
    inset:0;
    z-index: 9999;
}
.modal-backdrop{
    position:absolute;
    inset:0;
    background: rgba(0,0,0,0.75);
    backdrop-filter: blur(2px);
}
.modal-dialog{
    position:relative;
    max-width: 1100px;
    width: calc(100% - 24px);
    margin: 16px auto;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 18px;
    overflow:hidden;
    background:#0b0f14;
    box-shadow: 0 25px 70px rgba(0,0,0,0.55);
}
.modal-close{
    position:absolute;
    top: 10px;
    right: 10px;
    width: 40px;
    height: 40px;
    border-radius: 999px;
    background: rgba(255,255,255,0.12);
    color: white;
    font-weight: 800;
    border: 1px solid rgba(255,255,255,0.18);
    z-index: 5;
}
.modal-close:hover{ background: rgba(255,255,255,0.18); }

.modal-body{
    display:grid;
    grid-template-columns: 1.6fr 1fr;
    min-height: 540px;
}
@media (max-width: 900px){
    .modal-dialog{
        top: auto;
        transform: none;
        margin: 12px auto;
    }
    .modal-body{
        grid-template-columns: 1fr;
        min-height: auto;
    }
}

.modal-image-wrap{
    position:relative;
    background:#000;
    display:flex;
    align-items:center;
    justify-content:center;
}
.modal-image{
    width:100%;
    height:100%;
    object-fit: cover;
    max-height: 78vh;
}

.modal-info{
    padding: 18px 18px 16px;
    color: #eaf0ff;
    display:flex;
    flex-direction:column;
    gap: 8px;
    background: radial-gradient(800px 400px at 20% 10%, rgba(64,135,255,0.18), transparent),
                radial-gradient(700px 350px at 90% 60%, rgba(0,205,163,0.12), transparent);
}
.modal-title{
    font-size: 22px;
    font-weight: 900;
    letter-spacing: .2px;
}
.modal-loc{
    font-size: 13px;
    opacity: .9;
    padding: 6px 10px;
    border-radius: 999px;
    display:inline-flex;
    width: fit-content;
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.14);
}
.modal-desc{
    font-size: 14px;
    line-height: 1.65;
    opacity: .95;
    margin-top: 6px;
}
.modal-actions{
    margin-top: auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 10px;
    padding-top: 14px;
}
.modal-nav{
    padding: 10px 12px;
    border-radius: 12px;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.18);
    color: #fff;
    font-weight: 700;
}
.modal-nav:hover{ background: rgba(255,255,255,0.18); }
.modal-counter{
    font-size: 12px;
    opacity:.85;
}
.modal-hint{
    font-size: 12px;
    opacity:.75;
    margin-top: 6px;
}
</style>

{{-- ================= SCRIPTS ================= --}}
<script>
(function(){
    const items = Array.from(document.querySelectorAll('.gallery-item'));
    const modal = document.getElementById('galleryModal');
    const backdrop = modal.querySelector('.modal-backdrop');

    const modalImage   = document.getElementById('modalImage');
    const modalTitle   = document.getElementById('modalTitle');
    const modalLoc     = document.getElementById('modalLoc');
    const modalDesc    = document.getElementById('modalDesc');
    const modalCounter = document.getElementById('modalCounter');

    const btnClose = document.getElementById('modalClose');
    const btnPrev  = document.getElementById('modalPrev');
    const btnNext  = document.getElementById('modalNext');

    // ---------- Set label preview ----------
    items.forEach(item => {
        item.querySelector('.place-preview').textContent = item.dataset.place;
    });

    // ---------- Parallax hover ----------
    items.forEach(item => {
        const img = item.querySelector('.gallery-img');

        item.addEventListener('mousemove', (e) => {
            const r = item.getBoundingClientRect();
            const x = ((e.clientX - r.left) / r.width - 0.5) * 10; // -5..5
            const y = ((e.clientY - r.top) / r.height - 0.5) * 10;

            // zoom already on hover, we add translate for parallax feel
            img.style.transform = `scale(1.14) translate(${x}px, ${y}px)`;
        });

        item.addEventListener('mouseleave', () => {
            img.style.transform = '';
        });
    });

    // ---------- Modal slider ----------
    let currentIndex = 0;
    let lastFocusEl = null;

    function setSlide(index){
        if(index < 0) index = items.length - 1;
        if(index >= items.length) index = 0;
        currentIndex = index;

        const it = items[currentIndex];
        modalImage.src = it.dataset.src;
        modalImage.alt = it.dataset.place;

        modalTitle.textContent = it.dataset.place || '-';
        modalLoc.textContent   = it.dataset.location || '-';
        modalDesc.textContent  = it.dataset.desc || '-';

        modalCounter.textContent = `${currentIndex + 1} / ${items.length}`;
    }

    function openModal(index){
        lastFocusEl = document.activeElement;

        setSlide(index);
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        // focus close for accessibility
        btnClose.focus();
    }

    function closeModal(){
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';

        if(lastFocusEl) lastFocusEl.focus();
    }

    items.forEach((item) => {
        item.addEventListener('click', () => openModal(parseInt(item.dataset.index, 10)));
    });

    btnPrev.addEventListener('click', () => setSlide(currentIndex - 1));
    btnNext.addEventListener('click', () => setSlide(currentIndex + 1));

    btnClose.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        const isOpen = !modal.classList.contains('hidden');
        if(!isOpen) return;

        if(e.key === 'Escape') closeModal();
        if(e.key === 'ArrowLeft') setSlide(currentIndex - 1);
        if(e.key === 'ArrowRight') setSlide(currentIndex + 1);
    });

})();
</script>

@endsection
