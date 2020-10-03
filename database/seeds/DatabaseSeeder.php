<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //This is done to execute the truncate methods.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $userQuantity = 200;
        $categoriesQuantity = 30;
        $productsQuantity = 1000;
        $transactionsQuantity = 1000;

        factory(User::class, $userQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        factory(Product::class, $productsQuantity)->create()->each(
            function ($product) {
                //Obtain 5 random categories
                $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categories);
            }
        );
        factory(Transaction::class, $transactionsQuantity)->create();
    }
}
