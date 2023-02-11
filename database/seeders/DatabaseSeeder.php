<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => '1',
                'created_at' => Carbon::now(),
            ],
        );
        $category = [
            [
                'name' => 'Men',
                'parent_id' => '0',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Women',
                'parent_id' => '0',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Office Wear',
                'parent_id' => '0',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hoodies',
                'parent_id' => '1',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dress',
                'parent_id' => '2',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('categories')->insert($category);
        $products = [
            [
                'name' => 'Black suit',
                'price' => '15000',
                'quantity' => '100',
                'discount' => '5',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Old suit',
                'price' => '20000',
                'quantity' => '100',
                'discount' => '6',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Short dress',
                'price' => '33500',
                'quantity' => '100',
                'discount' => '7',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Prince dress',
                'price' => '55000',
                'quantity' => '100',
                'discount' => '5',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hoodies',
                'price' => '50000',
                'quantity' => '100',
                'discount' => '10',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Black suit 1990',
                'price' => '75000',
                'quantity' => '100',
                'discount' => '3',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Coast',
                'price' => '35000',
                'quantity' => '100',
                'discount' => '5',
                'description' => 'Just when you thought iMac had everything.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('products')->insert($products);

        $category_product = [
            [
                'category_id' => 1,
                'product_id' => 1
            ],
            [
                'category_id' => 1,
                'product_id' => 2
            ],
            [
                'category_id' => 5,
                'product_id' => 3
            ],
            [
                'category_id' => 5,
                'product_id' => 4
            ],
            [
                'category_id' => 4,
                'product_id' => 5
            ],
            [
                'category_id' => 1,
                'product_id' => 6
            ],
            [
                'category_id' => 3,
                'product_id' => 7
            ],
        ];
        DB::table('category_product')->insert($category_product);
    }
}
