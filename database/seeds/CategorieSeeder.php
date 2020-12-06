<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Baskets'],
            ['name' => 'Shoes'],
            ['name' => 'Espadrilles'],
            ['name' => 'Loafers'],
            ['name' => 'Sandals'],
        ]);
    }
}
