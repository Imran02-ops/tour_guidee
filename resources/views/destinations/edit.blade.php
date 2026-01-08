@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">

<h2 class="text-2xl font-bold mb-6">Edit Destinasi</h2>

<form method="POST" action="{{ route('destinations.update',$destination->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<input name="name" value="{{ $destination->name }}" class="w-full border p-2 mb-4">
<input name="location" value="{{ $destination->location }}" class="w-full border p-2 mb-4">
<input name="price" value="{{ $destination->price }}" class="w-full border p-2 mb-4">
<input name="category" value="{{ $destination->category }}" class="w-full border p-2 mb-4">

<textarea name="description" class="w-full border p-2 mb-4">{{ $destination->description }}</textarea>

<img src="{{ asset('storage/'.$destination->image) }}" class="h-40 mb-4">

<input type="file" name="image" class="mb-4">

<button class="bg-teal-600 text-white px-6 py-2 rounded">Simpan</button>

</form>
</div>
@endsection
