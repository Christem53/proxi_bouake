<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function scopeActives($query)
{
    return $query->where('statut','actif');
}
}