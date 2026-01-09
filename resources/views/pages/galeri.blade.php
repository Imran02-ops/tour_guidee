@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-24">

    <h2 class="text-4xl font-extrabold text-center mb-14">
        Galeri <span class="text-teal-700">JejakLangkah.id</span>
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg'] as $img)
            <div class="overflow-hidden rounded-2xl shadow-lg group aspect-[3/4]">
                <img src="{{ asset('images/gallery/'.$img) }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
        @endforeach
    </div>

</div>
@endsection
