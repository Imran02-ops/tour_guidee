@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="relative h-[220px] sm:h-[260px] md:h-[300px] bg-cover bg-center overflow-hidden"
style="background-image:url('{{ asset('images/gggg.png') }}')">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative h-full flex items-center justify-center">
        <h1 class="hero-title text-white text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-wide">
            Profil
        </h1>
    </div>
</section>

<!-- ================= INTRO ================= -->
<section class="max-w-7xl mx-auto px-5 sm:px-8 py-16 sm:py-24
grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">

    <div class="profile-logo flex justify-center">
        <img src="{{ asset('images/logo.png') }}"
        class="w-44 sm:w-56 md:w-64 drop-shadow-2xl floating">
    </div>

    <div class="profile-text text-center md:text-left">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-teal-700 mb-4">
            JejakLangkah.id
        </h2>
        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
            Jejak Langkah adalah penyedia layanan pemandu wisata (tour guide) profesional 
            yang berfokus pada eksplorasi keindahan alam dan kekayaan budaya lokal. Kami 
            percaya bahwa setiap perjalanan bukan sekadar berpindah tempat, melainkan cara 
            kita meninggalkan jejak bermakna di setiap destinasi yang dikunjungi.
        </p>
    </div>

</section>

<!-- ================= VISI & MISI ================= -->
<section class="relative py-24 bg-gradient-to-br from-slate-100 via-white to-slate-50 overflow-hidden">

    <div class="absolute -top-32 -left-32 w-96 h-96 bg-teal-200/30 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-200/30 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-5 sm:px-8">

        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-teal-700 tracking-wide">
                Visi & Misi
            </h2>
            <p class="text-gray-500 mt-3">
                Komitmen kami dalam membangun perjalanan bermakna
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="vm-card-premium">
                <h3 class="text-xl font-bold text-teal-700 mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi penyedia layanan pemandu wisata terdepan yang menginspirasi 
                    eksplorasi alam dan budaya Nusantara secara berkelanjutan dan bermakna.
                </p>
            </div>

            <div class="vm-card-premium delay">
                <h3 class="text-xl font-bold text-teal-700 mb-4">Misi</h3>
                <ul class="space-y-2 text-gray-600 leading-relaxed list-disc list-inside">
                    <li>Menyediakan layanan wisata profesional dan terpercaya</li>
                    <li>Mengangkat potensi budaya dan destinasi lokal</li>
                    <li>Membangun pengalaman perjalanan yang aman dan nyaman</li>
                    <li>Mendukung pariwisata berkelanjutan</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ================= STYLE ================= -->
<style>
.floating {
    animation: float 5s ease-in-out infinite;
}
@keyframes float {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-14px); }
}

.hero-title {
    animation: fadeDown 1s ease-out forwards;
}
@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.profile-logo, .profile-text, .vm-card-premium {
    opacity: 0;
    transform: translateY(60px);
    transition: 1s ease;
}

.profile-logo.show, .profile-text.show, .vm-card-premium.show {
    opacity: 1;
    transform: translateY(0);
}

.vm-card-premium {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(10px);
    border-radius: 22px;
    padding: 34px;
    border: 3px solid #0f766e;   /* GARIS TEPI HIJAU BRAND */
    box-shadow: 0 30px 60px rgba(0,0,0,0.08);
}

.vm-card-premium.delay {
    transition-delay: .25s;
}

.vm-card-premium:hover {
    transform: translateY(-10px) scale(1.03);
}
</style>

<!-- ================= SCRIPT ================= -->
<script>
const revealElements = document.querySelectorAll('.profile-logo, .profile-text, .vm-card-premium');

function revealOnScroll() {
    revealElements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if (top < window.innerHeight - 120) {
            el.classList.add('show');
        }
    });
}

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();
</script>

@endsection
