<?php

namespace App\Http\Controllers;

use App\Models\Prestation;

class ServiceController extends Controller
{

    public function show(Prestation $prestation)
    {

        $prestation->load([
            'category',
            'prestataire',
            'prestataire.user'
        ]);


        return view('services.show', compact('prestation'));

    }

}