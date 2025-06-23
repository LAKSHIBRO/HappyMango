<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'status_id',
        'caption', // Added caption
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
