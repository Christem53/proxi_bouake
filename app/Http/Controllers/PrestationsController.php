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

            'image'=>'nullable|image|max:2048',


        ]);





        // Gestion de l'image

        $image = null;



        if($request->hasFile('image')){


            $image = $request->file('image')
                ->store('prestations','public');


        }






        Prestation::create([


            'user_id'=>auth()->id(),


            'category_id'=>$request->category_id,


            'titre'=>$request->titre,


            'description'=>$request->description,


            'statut'=>'en_attente',


            'prix'=>$request->prix,


            'image'=>$image,



        ]);






        return redirect()

            ->route('prestations.index')

            ->with('success','Prestation publiée avec succès');


    }

        /**
     * Formulaire modification
     */
    public function edit($id)
    {


        $prestation = Prestation::where('user_id',auth()->id())
            ->findOrFail($id);



        $categories = Category::all();


        return view('prestations.edit', compact(
            'prestation',
            'categories'
        ));

    }

    /**
 * Mise à jour d'une prestation
 */
public function update(Request $request, $id)
{


    $prestation = Prestation::where('user_id', auth()->id())
        ->findOrFail($id);



    $request->validate([

        'category_id'=>'required',

        'titre'=>'required',

        'description'=>'required',

        'prix'=>'nullable|numeric',

        'image'=>'nullable|image|max:2048',

    ]);




    $image = $prestation->image;




    // Si une nouvelle image est envoyée

    if($request->hasFile('image')){


        // Supprimer l'ancienne image

        if($prestation->image){

            \Storage::disk('public')
                ->delete($prestation->image);

        }



        // Enregistrer la nouvelle

        $image = $request->file('image')
            ->store('prestations','public');


    }





    $prestation->update([


        'category_id'=>$request->category_id,

        'titre'=>$request->titre,

        'description'=>$request->description,

        'prix'=>$request->prix,

        'image'=>$image,


    ]);






    return redirect()

        ->route('prestations.index')

        ->with('success','Prestation modifiée avec succès');


}

/**
 * Supprimer une prestation
 */
public function destroy($id)
{

    $prestation = Prestation::where('user_id', auth()->id())
        ->findOrFail($id);



    // Supprimer l'image si elle existe

    if($prestation->image){

        \Storage::disk('public')
            ->delete($prestation->image);

    }




    $prestation->delete();





    return redirect()

        ->route('prestations.index')

        ->with('success','Prestation supprimée avec succès');

}


}