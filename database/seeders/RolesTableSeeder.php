<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles = [
            [
                'nom_role' => 'admin'
            ],
            [
                'nom_role' => 'livreur'
            ],
            [
                'nom_role' => 'moderateur'
            ],
            [
                'nom_role' => 'client'
            ],
        ];

        // Insert roles into the database
        foreach ($roles as $role) {
            Role::create($role);
        }

        $this->command->info('Default roles created successfully.');
    }
}
