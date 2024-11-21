<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvChannel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref',
        'name',
        'link',
        'image',
        'date_time'
    ];
}
