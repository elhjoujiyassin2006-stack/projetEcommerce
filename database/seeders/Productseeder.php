<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; 
use Faker\Factory as Faker;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create(); 
 
    for ($i = 0; $i < 26; $i++) { 
        Product::insert([ 
            'titre' => $faker->sentence(), 
            'contenu' => $faker->text(600), 
            'image' => $faker->imageUrl(),
            'categorie'=>$faker-> randomElement(['men','women']),
            'solde'=>$faker-> boolean(),
            'prix'=>$faker->randomFloat(2, 80, 900),
        ]); 
    } 
    }
}
