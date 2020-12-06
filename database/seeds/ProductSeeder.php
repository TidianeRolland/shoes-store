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
                'name' => "Black Lace-Up Sole Sneakers - Black/Orange",
                'price' => 2490,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/00/152041/1.jpg?4653',
                'categorie_id' => 1
            ],
            [
                'name' => "Men’s Lace-Up Low Sneakers - Black/Red",
                'price' => 2490,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/99/469721/1.jpg?7113',
                'categorie_id' => 1
            ],
            [
                'name' => "Pair Of Men’s Sneakers Class -White",
                'price' => 5700,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/11/830001/1.jpg?6734',
                'categorie_id' => 1
            ],
            [
                'name' => "Men’s High Sneaker - Black/ White",
                'price' => 7800,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/07/025631/1.jpg?5125',
                'categorie_id' => 1
            ],
            [
                'name' => "Brilliant Men’s Sneakers Love-Black Style",
                'price' => 1999,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/96/368731/1.jpg?5085',
                'categorie_id' => 1
            ],
            [
                'name' => "Men’s Sneakers For Men - Black",
                'price' => 6750,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/15/006141/1.jpg?7484',
                'categorie_id' => 1
            ],

            // Souliers
            [
                'name' => "Men’s Shoe - Black",
                'price' => 5400,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/71/03748/1.jpg?8246',
                'categorie_id' => 2
            ],
            [
                'name' => "Men’s Shoe - Pointed Toe - Black",
                'price' => 6900,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/90/125631/1.jpg?8170',
                'categorie_id' => 2
            ],
            [
                'name' => "Men’s Richelieu Pair - Black",
                'price' => 3300,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/54/460031/1.jpg?3631',
                'categorie_id' => 2
            ],
            [
                'name' => "Men’s Shoes - Brown",
                'price' => 7990,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/45/712041/1.jpg?5157',
                'categorie_id' => 2
            ],
            [
                'name' => "Glorystar Pair Of Shoes - Black",
                'price' => 8200,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/77/450201/1.jpg?9364',
                'categorie_id' => 2
            ],
            [
                'name' => "Other Black Sheathed Leather Men’s High Shoe",
                'price' => 27000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/99/156241/1.jpg?2886',
                'categorie_id' => 2
            ],

            // Espadrilles
            [
                'name' => "Black and White Stripe Espadrilles",
                'price' => 7950,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/63/147241/1.jpg?2377',
                'categorie_id' => 3
            ],
            [
                'name' => "Relax Espadrilles Mixed - Black",
                'price' => 4500,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/69/102241/1.jpg?6809',
                'categorie_id' => 3
            ],
            [
                'name' => "Men’s Espadrille - Blue",
                'price' => 5500,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/59/311241/1.jpg?9020',
                'categorie_id' => 3
            ],
            [
                'name' => "Reva Classic Espadrilles - Night Blue",
                'price' => 6000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/69/249241/1.jpg?4091',
                'categorie_id' => 3
            ],
            [
                'name' => "Reva Espadrille Relaxation Edition",
                'price' => 6000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/56/179731/1.jpg?3774',
                'categorie_id' => 3
            ],
            
            // Mocasssins
            [
                'name' => "Men’s Derby - Black",
                'price' => 9500,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/60/82442/1.jpg?7956',
                'categorie_id' => 4
            ],
            [
                'name' => "Richard Simpson Two-Tone Loafers Mustache Detail -GOLD/WHITE",
                'price' => 21400,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/53/567931/1.jpg?4341',
                'categorie_id' => 4
            ],
            [
                'name' => "Men’s Loafers - Grey",
                'price' => 4560,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/57/997731/1.jpg?7237',
                'categorie_id' => 4
            ],
            [
                'name' => "City Classic Men’s Lace Up Loafer - Black",
                'price' => 10000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/12/121041/1.jpg?4847',
                'categorie_id' => 4
            ],
            [
                'name' => "Men’s Rising Derbies in Laces - Suede - Night Blue",
                'price' => 19900,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/20/753731/1.jpg?9092',
                'categorie_id' => 4
            ],
            
            // Sandales
            [
                'name' => "Brumas’s Rope Sandal - Black Leather New Collection",
                'price' => 22500,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/08/256831/1.jpg?4464',
                'categorie_id' => 5
            ],
            [
                'name' => "Arena Sandals Tap - Sports - Arena - Yellow",
                'price' => 6100,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/39/555831/1.jpg?9109',
                'categorie_id' => 5
            ],
            [
                'name' => "Men’s Sandals - Grey",
                'price' => 3800,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/63/214731/1.jpg?2674',
                'categorie_id' => 5
            ],
            [
                'name' => "Sandals - Kito For Men - White/ Black",
                'price' => 4900,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/52/524041/1.jpg?6846',
                'categorie_id' => 5
            ],
            [
                'name' => "Elegant Embroidered Slippers - Blue",
                'price' => 3000,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/46/781831/1.jpg?3167',
                'categorie_id' => 5
            ],
            [
                'name' => "Man Handmade Sandal - Brown",
                'price' => 3500,
                'currency' => "XOF",
                'image' => 'https://ci.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/44/509041/1.jpg?3468',
                'categorie_id' => 5
            ],

        ]);
    }
}
