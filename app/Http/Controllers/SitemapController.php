<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $destinations = Destination::latest()->get();

        return response()
            ->view('sitemap', compact('destinations'))
            ->header('Content-Type', 'text/xml');
    }
}
