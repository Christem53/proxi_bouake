<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestationImage extends Model
{

    protected $fillable = [
        'prestation_id',
        'image'
    ];


    public function prestation()
    {
        return $this->belongsTo(Prestation::class);
    }

}