<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';
    protected $fillable =[
        'name',
        'message',
        'position',
        'image',
        'email',
    ];
}
