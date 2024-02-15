<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;


class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'depart',
        'date',
        'action',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function passagers()
    {
        return $this->belongsToMany(User::class, 'chauffeur_passager', 'route_id', 'passager_id')
            ->withPivot('chauffeur_id')
            ->withTimestamps();
    }
}
