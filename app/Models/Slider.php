<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'home_page_slider';
    protected $fillable=[
        'image'
    ];

}
