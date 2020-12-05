<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            // Baskets
            [
                'name' => "Baskets Semelles Noirs À Lacets - Noir/Orange",
                'price' => 2490,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/00/152041/1.jpg?4653',
                'categorie_id' => 1
            ],
            [
                'name' => "Baskets Basses à Lacets Pour Homme - Noir/Rouge",
                'price' => 2490,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/99/469721/1.jpg?7113',
                'categorie_id' => 1
            ],
            [
                'name' => "Paire De Baskets Class Pour Homme -Blanc",
                'price' => 5700,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/11/830001/1.jpg?6734',
                'categorie_id' => 1
            ],
            [
                'name' => "Basket Montante Pour Homme - Noir / Blanc",
                'price' => 7800,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/07/025631/1.jpg?5125',
                'categorie_id' => 1
            ],
            [
                'name' => "Baskets Brillantes Homme Style Amoureux-Noir",
                'price' => 1999,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/96/368731/1.jpg?5085',
                'categorie_id' => 1
            ],
            [
                'name' => "Homme Baskets Pour Homme - Noir",
                'price' => 6750,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/15/006141/1.jpg?7484',
                'categorie_id' => 1
            ],

            // Souliers
            [
                'name' => "Soulier Pour Homme - Noir",
                'price' => 5400,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/71/03748/1.jpg?8246',
                'categorie_id' => 2
            ],
            [
                'name' => "Soulier Pour Homme - Bout Pointu - Noir",
                'price' => 6900,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/90/125631/1.jpg?8170',
                'categorie_id' => 2
            ],
            [
                'name' => "Paire De Richelieu Pour Homme - Noir",
                'price' => 3300,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/54/460031/1.jpg?3631',
                'categorie_id' => 2
            ],
            [
                'name' => "Souliers Pour Homme - Marron",
                'price' => 7990,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/45/712041/1.jpg?5157',
                'categorie_id' => 2
            ],
            [
                'name' => "Glorystar Paire De Soulier - Noir",
                'price' => 8200,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/77/450201/1.jpg?9364',
                'categorie_id' => 2
            ],
            [
                'name' => "Autre Soulier Montante Homme En Cuir A Gaine Noir",
                'price' => 27000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/99/156241/1.jpg?2886',
                'categorie_id' => 2
            ],

        ]);
    }
}
