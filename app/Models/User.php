<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Prestataire;
use App\Models\Prestation;
use App\Notifications\ResetPasswordNotification;


#[Fillable(['name', 'email', 'phone', 'ville', 
'quartier', 'photo', 'role','password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  public function prestataire()
{
    return $this->hasOne(Prestataire::class, 'user_id', 'id');
}

public function prestations()
{
    return $this->hasMany(Prestation::class);
}

public function demandesEnvoyees()
{
    return $this->hasMany(Demande::class, 'client_id');
}

public function avis()
{
    return $this->hasMany(Avis::class, 'client_id');
}


public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}
}
