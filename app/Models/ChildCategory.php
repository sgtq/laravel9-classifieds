<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'name',
        'slug',
        'image',
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
