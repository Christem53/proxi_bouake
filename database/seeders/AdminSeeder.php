<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@proxibouake.com',
            'phone' => '0714911866',
            'role' => 'admin',
            'password' => Hash::make('admin12345'),
            'ville' => 'Bouake',
            'quartier' => 'NDAKRO'
        ]);
    }
}