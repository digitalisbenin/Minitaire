<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count(Role::all())) {

            Role::create(
                [
                    'name' => 'Administrateurs',
                    'description' => 'L\'Administrateurs du projet',
                    'created_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            );

            Role::create(
               
                [
                    'name' => 'Formateurs',
                    'description' => 'Formateurs pour les apprenants',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            );
            Role::create(
               
                [
                    'name' => 'Apprenants',
                    'description' => 'Les apprenants ',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            ); 
            
        }
    }
}
