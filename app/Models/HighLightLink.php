<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighLightLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'high_light_id',
        'reso',
        'link',
        'ref',
    ];
}
