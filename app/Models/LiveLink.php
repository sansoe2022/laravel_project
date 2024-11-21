<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'live_id',
        'reso',
        'link',
        'ref',
    ];

    public function live()
    {
        return $this->belongsTo(Live::class);
    }
}
