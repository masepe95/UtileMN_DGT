<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT'); // Italian faker data

        foreach (range(1, 100) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'codice_fiscale' => strtoupper(substr($faker->sha1, 0, 16)), // Just an example, use a proper CF generator if needed
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
