<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{

    protected $fillable = [
        'user_id',
        'category_id',
        'titre',
        'description',
        'prix',
        'image',
        'statut'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function prestataire()
    {
        return $this->hasOneThrough(
            Prestataire::class,
            User::class,
            'id',        // clé users
            'user_id',   // clé prestataires
            'user_id',   // clé prestations
            'id'
        );
    }

}