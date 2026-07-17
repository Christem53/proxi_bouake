<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prestataire;

class Category extends Model
{

    protected $fillable = [
        'name',
        'description',
        'icon',
        'status'
    ];

    public function prestataires()
{
    return $this->hasMany(Prestataire::class);
}

}
