<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighLight extends Model
{
    use HasFactory;
    protected $fillable = [
        'league',
        'home_name',
        'home_logo',
        'away_name',
        'away_logo',
        'date_time',
        'result'];
        
        public function links(){
            return $this->hasMany(HighLightLink::class);
        }
}
