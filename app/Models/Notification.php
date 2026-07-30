<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'prestataire_id',
        'demande_id',
        'message',
        'lu',
    ];


    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }


    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}