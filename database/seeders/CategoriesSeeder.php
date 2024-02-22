<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => "osobowe",
        ]);
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => "motocykle",
        ]);
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => "ciężarowe",
        ]);
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => "inne",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => "miejskie",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => "sportowe",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => "off-road",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => "sportowe",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => "turystyczne",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => "off-road",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 3,
            'name' => "poniżej 3,5 T",
        ]);
        DB::table('categories')->insert([
            'parent_id' => 3,
            'name' => "powyżej 3,5 T",
        ]);
        
        
        
    }
}
