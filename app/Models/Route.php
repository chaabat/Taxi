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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
