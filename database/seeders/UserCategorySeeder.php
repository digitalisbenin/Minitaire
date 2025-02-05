<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserCategory;
use Illuminate\Support\Facades\DB;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count(UserCategory::all())) {

            UserCategory::create(
                [
                    'name' => 'Officiers',
                    'description' => 'L\'Officiers du projet',
                    'created_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            );

            UserCategory::create(
               
                [
                    'name' => 'Sous-officiers',
                    'description' => 'Sous-officiers pour les apprenants',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            );
        
            
        }
    }
}
