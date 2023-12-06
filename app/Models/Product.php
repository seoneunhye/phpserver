<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // protected $fillable = ['name', 'description', 'price'];
    // public $timestamps = false;

    /**
     * 다대다 관계 설정
     *  */

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
