<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tour Guides</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #f3f4f6;
}

.hero-bg {
    background-image: url('{{ asset('images/bg22.jpeg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
}

.glass-box {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 24px;
    border: 1px solid rgba(255,255,255,0.25);
}

.nav-link {
    position: relative;
    padding-bottom: 4px;
    transition: color 0.3s ease;
}

.nav-link::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -3px;
    width: 0;
    height: 3px;
    background: white;
    border-radius: 999px;
    transition: width 0.3s ease;
}

.nav-link:hover {
    color: #d1fae5;
}

.nav-link:hover::after {
    width: 100%;
}

.glass-box {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 24px;
    border: 1px solid rgba(255,255,255,0.25);
}

</style>
</head>

<body>

<!-- NAVBAR -->
<header class="bg-teal-700 shadow-lg fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">
            <span class="text-white text-2xl font-extrabold tracking-wide">JejakLangkah.id</span>
        </div>

        <form action="{{ route('destinations.index') }}" method="GET"
      class="flex-1 flex justify-center items-center gap-2">

    <input
        type="text"
        name="search"
        placeholder="Cari pantai, gunung, budaya..."
        value="{{ request('search') }}"
        class="w-full max-w-md px-5 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-400 transition"
    >

    <button type="submit"
        class="bg-white text-teal-700 px-5 py-2 rounded-full font-semibold hover:bg-teal-100 transition shadow">
        🔍 Search
    </button>
</form>

        <nav class="flex gap-10 text-white font-semibold">
            <a href="/" class="nav-link">Home</a>
            <a href="{{ route('destinations.index') }}" class="nav-link">Destinations</a>
        </nav>

    </div>
</header>

<!-- CONTENT -->
<main class="pt-28">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-teal-700 text-white mt-24">
    <div class="max-w-7xl mx-auto px-6 py-14">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left">
            <div>
                <h3 class="text-2xl font-bold mb-3">JejakLangkah.id</h3>
                <p class="text-sm text-teal-100">
                    Platform wisata NTB terbaik dengan guide profesional.
                </p>
            </div>

            <div>
                <h4 class="font-semibold mb-3">Menu</h4>
                <ul class="space-y-2 text-teal-100">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/destinations" class="hover:text-white">Destinations</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-3">Informasi</h4>
                <ul class="space-y-2 text-teal-100">
                    <li>📍 Nusa Tenggara Barat</li>
                    <li>📧 info@JejakLangkah.id</li>
                    <li>📞 +62 819-4487-2700</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-teal-500 my-8"></div>

        <div class="text-center text-sm text-teal-100">
            © {{ date('Y') }} <b class="text-white">JejakLangkah.id</b>. All rights reserved.
        </div>

    </div>
</footer>

</body>
</html>
