<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Définir les règles de validation du profil.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Nom complet
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            // Adresse email
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            // Numéro de téléphone
            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            // Ville
            'ville' => [
                'nullable',
                'string',
                'max:255',
            ],

            // Quartier
            'quartier' => [
                'nullable',
                'string',
                'max:255',
            ],

            // Photo de profil
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ];
    }
}
