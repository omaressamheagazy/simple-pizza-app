<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pizzas')->insert([
            'name' => 'Egyptian pizza',
            'description' => 'Made with love',
            'price' => 7,
            'image' => 'dummy place',
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Italian pizza',
            'description' => 'Made with love',
            'price' => 10,
            'image' => 'dummy place',
        ]);

    }
}
