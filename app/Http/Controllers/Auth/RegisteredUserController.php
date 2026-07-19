<?php

namespace App\Http\Controllers\Auth;


// Contrôleur de base Laravel
use App\Http\Controllers\Controller;


// Modèle utilisateur
use App\Models\User;


// Événement envoyé après inscription
use Illuminate\Auth\Events\Registered;


// Types de réponses HTTP
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


// Gestion de l'authentification
use Illuminate\Support\Facades\Auth;


// Sécurisation du mot de passe
use Illuminate\Support\Facades\Hash;


// Règles de validation du mot de passe
use Illuminate\Validation\Rules;


// Gestion des erreurs de validation
use Illuminate\Validation\ValidationException;


// Type de vue retournée
use Illuminate\View\View;



class RegisteredUserController extends Controller
{


    /**
     * Affiche la page d'inscription
     */
    public function create(): View
    {

        // Retourne la vue register.blade.php

        return view('auth.register');

    }





    /**
     * Traite la demande d'inscription
     *
     * Création du compte utilisateur
     */
    public function store(Request $request): RedirectResponse
    {



        // Validation des informations envoyées par le formulaire

        $request->validate([



            // Le nom est obligatoire et limité à 255 caractères

            'name' => [
                'required',
                'string',
                'max:255'
            ],





            // L'email doit être valide et unique dans la table users

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:'.User::class
            ],





            // Le mot de passe doit respecter les règles Laravel
            // et doit être confirmé

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],



        ],
        [


            // Message personnalisé si l'email existe déjà

            'email.unique' => 'Cette adresse email est déjà utilisée.',


            // Message si l'email n'est pas valide

            'email.email' => 'Veuillez entrer une adresse email valide.',


        ]);







        // Création du nouvel utilisateur dans la base de données

        $user = User::create([



            // Nom de l'utilisateur

            'name' => $request->name,



            // Adresse email

            'email' => $request->email,



            // Numéro de téléphone

            'phone' => $request->phone,



            // Ville renseignée

            'ville' => $request->ville,



            // Quartier renseigné

            'quartier' => $request->quartier,



            // Tous les nouveaux comptes deviennent clients

            'role' => 'client',



            // Cryptage du mot de passe avant stockage

            'password' => Hash::make($request->password),



        ]);







        // Déclenche l'événement d'inscription Laravel
        // (utile pour la vérification email)

        event(new Registered($user));







        // Connecte automatiquement l'utilisateur après inscription

        Auth::login($user);







        // Redirection vers le dashboard client

        return redirect(route('dashboard', absolute: false));



    }


}