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
        'image',
        'description'
    ];

    public function sub_categories()
    {
        $this->hasMany('sub_categories');
    }

    public function ads()
    {
        $this->hasMany('ads');
    }
}
