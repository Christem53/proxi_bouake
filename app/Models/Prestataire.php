<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
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
    'latitude',
    'longitude',
];

public function user()
{
    return $this->belongsTo(User::class);
}


public function category()
{
    return $this->belongsTo(Category::class);
}
}
