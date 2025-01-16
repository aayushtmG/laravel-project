<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
   use HasFactory; 
   protected $fillable = [
    'image',
    'name'
   ];
}
