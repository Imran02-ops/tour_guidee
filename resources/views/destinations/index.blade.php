@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<section class="relative bg-cover bg-center min-h-[320px]"
    style="background-image: url('{{ asset('images/bg-destination1.jpg') }}')">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 flex items-center justify-center min-h-[320px] px-6">
        <div class="backdrop-blur-md bg-white/20 rounded-2xl px-10 py-10 text-center max-w-5xl w-full">

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Semua Destinasi Wisata
            </h1>

            {{-- FILTER --}}
            <div class="flex flex-wrap justify-center gap-3">

                <a href="{{ route('destinations.index') }}"
                   class="px-6 py-2 rounded-full font-semibold transition
                   {{ empty($activeCategory) ? 'bg-white text-teal-700' : 'bg-teal-600 text-white hover:bg-teal-500' }}">
                    Semua
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('destinations.index', ['category' => $cat]) }}"
                       class="px-6 py-2 rounded-full font-semibold capitalize transition
                       {{ $activeCategory === $cat ? 'bg-white text-teal-700' : 'bg-teal-600 text-white hover:bg-teal-500' }}">
                        {{ ucwords(str_replace('-', ' ', $cat)) }}
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</section>

{{-- KATALOG --}}
<section class="bg-gray-100 py-16">
<div class="max-w-7xl mx-auto px-6">

    {{-- TOMBOL TAMBAH --}}
    <div class="flex justify-end mb-6">
        <a href="{{ route('destinations.create') }}"
           class="flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-full font-bold shadow transition">
            <span class="text-xl">＋</span> Tambah Destinasi
        </a>
    </div>

    @if($destinations->count())

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">

        @foreach($destinations as $d)
        <a href="{{ route('destinations.show', $d->id) }}"
           class="block bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">

            <div class="relative">
                <img src="{{ asset('storage/'.$d->image) }}" class="h-44 w-full object-cover">

                <span class="absolute top-2 left-2 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">
                    {{ ucwords(str_replace('-', ' ', $d->category)) }}
                </span>
            </div>

            <div class="p-4">
                <h3 class="font-bold text-base mb-1">{{ $d->name }}</h3>
                <p class="text-sm text-gray-500">{{ $d->location }}</p>

                <p class="mt-2 font-semibold text-teal-700">
                    Rp {{ number_format($d->price,0,',','.') }}
                </p>
            </div>
        </a>
        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="mt-12 flex justify-end">
        {{ $destinations->links() }}
    </div>

    @else
        <div class="bg-white/70 backdrop-blur rounded-xl p-12 text-center text-gray-600">
            Tidak ada destinasi untuk kategori ini
        </div>
    @endif

</div>
</section>

@endsection
