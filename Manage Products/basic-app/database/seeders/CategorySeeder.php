<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = [];

        foreach (range(1, 20) as $index) {
            $categories[] = [
                'name' => $faker->text(20),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
