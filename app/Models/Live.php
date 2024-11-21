<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $fillable = [
        'league',
        'home_name',
        'home_logo',
        'away_name',
        'away_logo',
        'date_time',
        'is_live'];
        public function links(){
            return $this->hasMany(LiveLink::class);
        }
}
