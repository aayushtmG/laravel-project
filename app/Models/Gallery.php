<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable =['name','description'];

    public function album(){
        return $this->hasMany(Album::class);
    }
}
