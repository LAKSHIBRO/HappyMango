<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'caption',
        // 'album_id', // If you ever re-enable album_id, add it here
    ];
}
