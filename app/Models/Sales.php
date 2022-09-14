<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable=['order_id','user_id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
