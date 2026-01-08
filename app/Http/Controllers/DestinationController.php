<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

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

        // PENTING: simpan query string agar pagination tidak lompat kategori
        $destinations = $query->latest()->paginate(10)->withQueryString();

        $categories = Destination::$allowedCategories;

        return view('destinations.index', compact('destinations', 'categories'))
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

        $image = $request->file('image');
        $fileName = time().'_'.$image->getClientOriginalName();
        $path = $image->storeAs('destinations', $fileName, 'public');

        Destination::create([
            'name'        => $validated['name'],
            'location'    => $validated['location'],
            'category'    => $validated['category'],
            'price'       => $validated['price'],
            'description' => $validated['description'],
            'image'       => $path,
        ]);

        return redirect()->route('destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }
}
