<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_img',
        'home_link',
        'first_home_img',
        'on_off',
    ];
}
