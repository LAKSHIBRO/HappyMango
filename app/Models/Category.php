<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_type_id',
        'status_id',
    ];

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }
}