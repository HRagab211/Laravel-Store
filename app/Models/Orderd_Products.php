<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderd_Products extends Model
{
    use HasFactory;
    protected $fillable=['product_id','user_id','oder_id'];

}
