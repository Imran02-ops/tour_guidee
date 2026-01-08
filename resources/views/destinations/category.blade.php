@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-cover bg-center"
         style="background-image:url('{{ asset('images/bg-destination.png') }}')">

    <div class="bg-black/50 min-h-screen py-20 px-10">

        <h1 class="text-5xl font-bold text-white mb-12">
            {{ ucfirst(str_replace('-', ' ', $category)) }}
        </h1>

        @if($destinations->count() == 0)
            <div class="bg-white/20 rounded-xl p-10 text-center text-white">
                Tidak ada destinasi untuk kategori ini
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @foreach($destinations as $d)
                <div class="bg-white/80 backdrop-blur rounded-xl overflow-hidden shadow">

                    <div class="relative">
                        <img src="{{ asset('images/destinations/'.$d->image) }}"
                             class="h-40 w-full object-cover">

                        <span class="absolute top-2 left-2 bg-teal-600
                                     text-white text-xs px-3 py-1 rounded-full">
                            {{ ucfirst($d->category) }}
                        </span>
                    </div>

                    <div class="p-4 text-black">
                        <h3 class="font-bold">{{ $d->title }}</h3>
                        <p class="text-sm text-gray-600">Indonesia</p>

                        <div class="text-yellow-400 text-sm">★★★★★ (4.5)</div>

                        <p class="font-bold text-teal-700 mt-2">
                            Rp {{ number_format($d->price,0,',','.') }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $destinations->links() }}
            </div>
        @endif

    </div>
</section>

@endsection
