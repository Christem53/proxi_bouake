<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use App\Models\Category;
use Illuminate\Http\Request;

class PrestationsController extends Controller
{


    public function index()
{

    /** @var \App\Models\User $user */
    $user = auth()->user();


    $prestations = $user->prestations()
        ->latest()
        ->get();


    return view('prestations.index', compact('prestations'));

}




    public function create()
    {

        $categories = Category::all();


        return view('prestations.create', compact('categories'));

    }





    public function store(Request $request)
    {

        $request->validate([

            'category_id'=>'required',
            'titre'=>'required',
            'description'=>'required',
            'prix'=>'nullable|numeric',

        ]);



        Prestation::create([

            'user_id'=>auth()->id(),

            'category_id'=>$request->category_id,

            'titre'=>$request->titre,

            'description'=>$request->description,

            'statut'=>'en_attente',

            'prix'=>$request->prix,


        ]);



        return redirect()
            ->route('prestations.index')
            ->with('success','Prestation publiée avec succès');

    }



}