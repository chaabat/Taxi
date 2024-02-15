<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class);
    }


    public function chauffeur()
    {
        return $this->belongsTo(User::class);
    }


    public function passager()
    {
        return $this->belongsTo(User::class, 'passager_id');
    }
}
