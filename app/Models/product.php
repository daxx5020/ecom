<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
}
