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
        DB::table('categories')->insert(
            [
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
            ]
        );
        DB::table('products')->insert(
            [
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black suit',
                    'price' => '1500000',
                    'quantity' => '12',
                    'description' => 'Just when you thought iMac had everything.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]
        );
    }
}
