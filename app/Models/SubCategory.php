<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
        //
    }

    public function category()
    {
        $this->belongsTo('category');
    }
}
