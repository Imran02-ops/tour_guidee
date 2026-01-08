@extends('layouts.app')

@section('content')

{{-- ================= HEADER ================= --}}
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

{{-- ================= KATALOG ================= --}}
<section class="bg-gray-100 py-16">
<div class="max-w-7xl mx-auto px-6">

    <div class="flex justify-end mb-6">
        <a href="{{ route('destinations.create') }}"
           class="flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-full font-bold shadow transition">
            <span class="text-xl">＋</span> Tambah Destinasi
        </a>
    </div>

    @if($destinations->count())

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">

        @foreach($destinations as $d)
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">

            <a href="{{ route('destinations.show', $d->id) }}">
                <div class="relative">
                    <img src="{{ asset('storage/'.$d->image) }}" class="h-44 w-full object-cover">
                    <span class="absolute top-2 left-2 bg-teal-600 text-white text-xs px-3 py-1 rounded-full">
                        {{ ucwords(str_replace('-', ' ', $d->category)) }}
                    </span>
                </div>

                <div class="p-4">
                    <h3 class="font-bold text-base mb-1">{{ $d->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $d->location }}</p>

                    <div class="flex items-center justify-between mt-2">
                        <p class="font-semibold text-teal-700">
                            Rp {{ number_format($d->price,0,',','.') }}
                        </p>

                        <div class="flex gap-2">
                            <button onclick="event.preventDefault(); openEditModal({{ $d }});"
                                class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-full">
                                Ubah
                            </button>

                            <form action="{{ route('destinations.destroy', $d->id) }}" method="POST"
                                  onsubmit="event.preventDefault(); if(confirm('Yakin hapus destinasi ini?')) this.submit();">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded-full">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>

    <div class="mt-12 flex justify-end">
        {{ $destinations->links() }}
    </div>

    @endif
</div>
</section>

{{-- ================= MODAL EDIT ================= --}}
<div id="editModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
<div class="bg-white rounded-xl p-6 w-full max-w-xl">

<h3 class="text-xl font-bold mb-4">Ubah Destinasi</h3>

<form id="editForm" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<input type="text" name="name" class="w-full border p-2 mb-3">
<input type="text" name="location" class="w-full border p-2 mb-3">
<input type="number" name="price" class="w-full border p-2 mb-3">

<select name="category" class="w-full border p-2 mb-3">
@foreach($categories as $cat)
<option value="{{ $cat }}">{{ ucwords(str_replace('-', ' ', $cat)) }}</option>
@endforeach
</select>

<textarea name="description" class="w-full border p-2 mb-3"></textarea>

<input type="file" name="image" class="mb-3">

<div class="flex justify-end gap-2">
    <button type="button" onclick="closeEditModal()" class="px-4 py-2 border rounded">Batal</button>
    <button class="bg-teal-600 text-white px-6 py-2 rounded">Simpan</button>
</div>

</form>
</div>
</div>

<script>
function openEditModal(data) {
    document.getElementById('editModal').classList.remove('hidden');
    let form = document.getElementById('editForm');
    form.action = `/destinations/${data.id}`;

    form.name.value = data.name;
    form.location.value = data.location;
    form.price.value = data.price;
    form.category.value = data.category;
    form.description.value = data.description;
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

@endsection
