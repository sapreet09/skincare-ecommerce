<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([

            [
                'vendor_id' => 1,
                'category_id' => 3,
                'name' => 'Vitamin C Face Serum',
                'slug' => 'vitamin-c-face-serum',
                'price' => 799,
                'description' => 'Brightens skin and reduces dark spots.',
                'image' => 'serum.jpg',
                'status' => 1,
                'stock' => 40,   // ADD THIS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'vendor_id' => 1,
                'category_id' => 2,
                'name' => 'Hydrating Moisturizer',
                'slug' => 'hydrating-moisturizer',
                'price' => 599,
                'description' => 'Deep hydration for dry skin.',
                'image' => 'moisturizer.jpg',
                'status' => 1,
                'stock' => 50,   // ADD THIS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'vendor_id' => 1,
                'category_id' => 1,
                'name' => 'Gentle Face Cleanser',
                'slug' => 'gentle-face-cleanser',
                'price' => 499,
                'description' => 'Removes dirt and oil.',
                'image' => 'cleanser.jpg',
                'status' => 1,
                'stock' => 60,   // ADD THIS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'vendor_id' => 1,
                'category_id' => 4,
                'name' => 'SPF 50 Sunscreen',
                'slug' => 'spf-50-sunscreen',
                'price' => 699,
                'description' => 'Protects skin from UV damage.',
                'image' => 'sunscreen.jpg',
                'status' => 1,
                'stock' => 80,   // ADD THIS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}