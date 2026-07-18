<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prestation;

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

 // Les services passent par le user
 public function prestations()
{
    return $this->hasMany(Prestation::class, 'user_id', 'user_id');
}

}
