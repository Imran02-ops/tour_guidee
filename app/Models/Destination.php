<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
    'name',
    'location',
    'category',
    'price',
    'description',
    'image'
];

public static $allowedCategories = [
    'pantai',
    'pegunungan-bukit',
    'wisata-alam',
    'wisata-religi',
    'wisata-tradisional'
];


}
