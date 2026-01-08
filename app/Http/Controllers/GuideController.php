<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
  private $guides = [
    1 => [
        'name' => 'Ilham Siddik',
        'specialty' => 'Wisata Alam',
        'rating' => 4.9,
        'experience' => '3 Tahun Pengalaman',
        'description' => 'Guide Wisata Alam.',
        'photo' => 'images/guides/guide1.jpeg',
        'background' => 'images/bg-guides/bg1.jpg'
    ],
    2 => [
        'name' => 'Samsul Lutfi',
        'specialty' => 'Gunung & Tracking',
        'rating' => 4.8,
        'experience' => '6 Tahun Pengalaman',
        'description' => 'Spesialis Jalur Pendakian NTB.',
        'photo' => 'images/guides/guide2.jpeg',
        'background' => 'images/bg-guides/bg2.jpg'
    ],
    3 => [
        'name' => 'Ahmad Imran',
        'specialty' => 'Wisata Tradisional',
        'rating' => 4.7,
        'experience' => '1 tahun pengalaman',
        'description' => 'Ahli Wisata Tradisional.',
        'photo' => 'images/guides/guide3.jpeg',
        'background' => 'images/bg-guides/bg3.jpg'
    ],
    4 => [
        'name' => 'Wirahadi Saputra',
        'specialty' => 'Wisata Pantai & Snorkeling',
        'rating' => 4.9,
        'experience' => '100 Tahun Pengalaman',
        'description' => 'Pemandu Wisata Pantai & Snorkeling profesional.',
        'photo' => 'images/guides/guide7.jpeg',
        'background' => 'images/bg-guides/bg4.jpg'
    ],
    5 => [
        'name' => 'Khutbi Al-Bayani',
        'specialty' => 'Wisata Religi',
        'rating' => 4.8,
        'experience' => '70 Tahun Pengalaman',
        'description' => 'Ahli Wisata Religi.',
        'photo' => 'images/guides/guide6.jpeg',
        'background' => 'images/bg-guides/bg-guides5.jpeg'
    ],
];  

    public function index()
    {
        return view('guides.index', ['guides' => $this->guides]);
    }

    public function show($id)
    {
        $guide = $this->guides[$id] ?? abort(404);
        return view('guides.show', compact('guide'));
    }
}
