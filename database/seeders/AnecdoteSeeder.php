<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AnecdoteSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('anecdotes')->insert([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'relation' => $faker->word,
                'ville' => $faker->city,
                'pays' => $faker->country,
                'anecdote' => $faker->text(800),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
