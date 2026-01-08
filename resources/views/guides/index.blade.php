@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-100">
<div class="max-w-7xl mx-auto px-6">

<h2 class="text-4xl font-bold mb-12 text-center">Guide Profesional</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 place-items-center">

@foreach($guides as $id => $guide)
<a href="{{ route('guides.show', $id) }}"
   class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-[240px] hover:scale-105 transition">

    <img src="{{ asset($guide['photo']) }}"
         class="w-40 h-40 object-cover rounded-full mx-auto border-4 border-teal-500 shadow-md mb-4">

    <h3 class="text-lg font-bold text-center">{{ $guide['name'] }}</h3>
    <p class="text-sm text-gray-500 text-center mb-2">{{ $guide['specialty'] }}</p>

    <p class="text-sm text-center text-teal-600 font-semibold mb-2">
        ⭐ {{ $guide['rating'] }} · {{ $guide['experience'] }}
    </p>

    <p class="text-xs text-gray-600 text-center">
        {{ $guide['description'] }}
    </p>
</a>
@endforeach

</div>
</div>
</section>
@endsection
