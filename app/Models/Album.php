<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','thumbnail_image']; 
    public function images(){
        return $this->hasMany(Image::class);
    }
}
