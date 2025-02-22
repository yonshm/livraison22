<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Zone;
use App\Models\Ville;
use App\Models\Status;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('nom_role', 'admin')->first();
        $admin = [
            'nom' => 'admin',
            'cin' => 'DD7',
            'telephone' => '0123456789',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123@gmail.com'),
            'local' => 1,
            'adresse' => 'default adresse',
            'numero_compte' => '1234567890',
            'id_role' => $role_admin->id,
            'status' => 1,
            'active' => 1,
        ];

        Utilisateur::create($admin);
        $this->command->info('Default admin and villes created successfully.');
    }
}
