<?php

use Illuminate\Database\Seeder;

class productseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
         $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
         $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
         $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
         $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
         $product = new \App\Product([
        	'imagePath' => 'http://www.wowkeren.com/images/news/00125265.jpg',
        	'title' => 'Irene RedVelvet',
        	'description' => 'so beautiful',
        	'price' =>  10000
        	]); 
        $product->save();
    }
}
