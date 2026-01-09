@extends('layouts.app')
@section('content')

<div class="max-w-7xl mx-auto px-10 py-24">

<h2 class="text-4xl font-bold text-center mb-14">
Guide Profesional <span class="text-teal-700">JejakLangkah.id</span>
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-10">

@foreach($guides as $id => $g)

<div class="bg-white rounded-2xl shadow-xl p-6 text-center">

    <div class="w-40 h-40 mx-auto rounded-full overflow-hidden mb-5 border-4 border-red-300">
        <img src="{{ asset($g['photo']) }}" class="w-full h-full object-cover">
    </div>

    <h3 class="text-xl font-bold">{{ $g['name'] }}</h3>

    <p class="text-sm text-gray-500 mb-1">
        📞 +{{ $g['phone'] }}
    </p>

    <p class="text-gray-600 mb-5">{{ $g['specialty'] }}</p>

    <div class="flex gap-3">
        <a href="{{ route('guides.show',$id) }}"
           class="flex-1 bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg text-sm font-semibold">
           DETAIL
        </a>

        <a href="https://wa.me/{{ $g['phone'] }}?text=Halo,%20saya%20ingin%20booking%20guide%20{{ urlencode($g['name']) }}"
           target="_blank"
           class="flex-1 bg-lime-400 hover:bg-lime-500 text-white py-2 rounded-lg text-sm font-semibold">
           BOOKING
        </a>
    </div>

</div>

@endforeach

</div>
</div>

@endsection
