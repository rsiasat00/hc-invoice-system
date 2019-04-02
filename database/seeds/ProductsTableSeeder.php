<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            array(
                'name' => "Product One",
                'price' => 10.00,
                'tax' => 0.02
            ),
            array(
                'name' => "Product Two",
                'price' => 11.00,
                'tax' => 0.03
            ),
            array(
                'name' => "Product Three",
                'price' => 12.00,
                'tax' => 0.2
            )

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
