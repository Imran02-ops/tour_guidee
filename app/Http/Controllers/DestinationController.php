<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index(Request $request)
{
    $query = Destination::query();

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->search}%")
              ->orWhere('location', 'like', "%{$request->search}%")
              ->orWhere('description', 'like', "%{$request->search}%");
        });
    }

    $destinations = $query->latest()->paginate(10)->withQueryString();
    $categories   = Destination::$allowedCategories;

    $manageMode = $request->boolean('manage');

    return view('destinations.index', compact('destinations', 'categories', 'manageMode'))
        ->with('activeCategory', $request->category);
}

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'category'    => 'required|in:' . implode(',', Destination::$allowedCategories),
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = time().'_'.$request->image->getClientOriginalName();
        $validated['image'] = $request->image->storeAs('destinations', $fileName, 'public');

        Destination::create($validated);

        return redirect()->route('destinations.index')->with('success','Destinasi berhasil ditambahkan');
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'category'    => 'required|in:' . implode(',', Destination::$allowedCategories),
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($destination->image);

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $validated['image'] = $request->image->storeAs('destinations', $fileName, 'public');
        }

        $destination->update($validated);

        return redirect()->route('destinations.index')->with('success','Destinasi berhasil diperbarui');
    }

    public function destroy(Destination $destination)
    {
        Storage::disk('public')->delete($destination->image);
        $destination->delete();

        return back()->with('success','Destinasi berhasil dihapus');
    }
}
