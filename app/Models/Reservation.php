<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Route;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'depart',
        'destination',
        'rating',
        'date',
        'favorits',
        'user_id',
        'route_id'
    ];

    public function route(){
        return $this->belongsTo(Route::class);
    }
}
