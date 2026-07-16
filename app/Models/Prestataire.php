<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    //
    protected $fillable = [
    'user_id',
    'category_id',
    'nom_entreprise',
    'photo',
    'description',
    'whatsapp',
    'ville',
    'quartier',
    'adresse',
    'experience',
    'disponible',
    'statut',
];
}
