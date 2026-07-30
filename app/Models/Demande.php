<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'client_id',
        'prestataire_id',
        'prestation_id',
        'message',
        'statut',
    ];

    // Client qui envoie la demande
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Prestataire qui reçoit la demande
    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }

    // Service demandé
    public function prestation()
    {
        return $this->belongsTo(Prestation::class);
    }

    public function notification()
{
    return $this->hasOne(Notification::class);
}

public function avis()
{
    return $this->hasOne(Avis::class);
}
}