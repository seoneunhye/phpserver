<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    // use HasFactory;
    // protected $fillable = ['name'];
    // public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
