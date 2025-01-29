<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable= ['album_id','image_path','title','description'];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
