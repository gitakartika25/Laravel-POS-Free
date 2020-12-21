<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    protected $fillable = [
        'name', 'category', 'price', 'trailer', 'description', 'image' , 'qty', 'user_id'
    ];
}
