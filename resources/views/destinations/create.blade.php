@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center px-6 py-20">

<div class="bg-white rounded-3xl shadow-2xl p-10 max-w-2xl w-full">

<h2 class="text-3xl font-bold mb-8 text-center text-teal-700">
Tambah Destinasi Wisata
</h2>

<form action="{{ route('destinations.stor  e') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
@csrf

{{-- Nama --}}
<div>
    <label class="block font-semibold mb-1">Nama Destinasi</label>
    <input type="text" name="name" value="{{ old('name') }}" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
</div>

{{-- Lokasi --}}
<div>
    <label class="block font-semibold mb-1">Lokasi</label>
    <input type="text" name="location" value="{{ old('location') }}" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
</div>

{{-- Kategori --}}
<div>
    <label class="block font-semibold mb-1">Kategori</label>
    <select name="category" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
        <option value="">-- Pilih Kategori --</option>
        <option value="pantai" {{ old('category')=='pantai' ? 'selected' : '' }}>Pantai</option>
        <option value="wisata-alam" {{ old('category')=='wisata-alam' ? 'selected' : '' }}>Wisata Alam</option>
        <option value="pegunungan-bukit" {{ old('category')=='pegunungan-bukit' ? 'selected' : '' }}>Pegunungan & Bukit</option>
        <option value="wisata-religi" {{ old('category')=='wisata-religi' ? 'selected' : '' }}>Wisata Religi</option>
        <option value="wisata-tradisional" {{ old('category')=='wisata-tradisional' ? 'selected' : '' }}>Wisata Tradisional</option>
    </select>
</div>

{{-- Harga --}}
<div>
    <label class="block font-semibold mb-1">Harga (Rp)</label>
    <input type="number" name="price" value="{{ old('price') }}" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
</div>

{{-- Deskripsi --}}
<div>
    <label class="block font-semibold mb-1">Deskripsi</label>
    <textarea name="description" rows="4" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">{{ old('description') }}</textarea>
</div>

{{-- Gambar --}}
<div>
    <label class="block font-semibold mb-1">Gambar</label>
    <input type="file" name="image" required class="block w-full">
</div>

{{-- Submit --}}
<button type="submit"
    class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-full font-bold transition">
    Simpan Destinasi
</button>

</form>

</div>
</div>
@endsection
