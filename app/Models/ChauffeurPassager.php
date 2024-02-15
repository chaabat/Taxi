<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChauffeurPassager extends Model
{
    use HasFactory;

    protected $table = 'chauffeur_passager';

    protected $fillable = [
        'passager_id',
        'chauffeur_id',
    ];
}
