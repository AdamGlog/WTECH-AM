<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlist')->insert([
        ['user_id' => 1, 'last_update' => '2026-05-02'],
        ['user_id' => 2, 'last_update' => '2026-05-01'],
        ['user_id' => 3, 'last_update' => '2026-05-03'],
        ['user_id' => 4, 'last_update' => '2026-05-05'],
        ['user_id' => 5, 'last_update' => '2026-05-04'],
        ['user_id' => 6, 'last_update' => '2026-05-06'],
        ['user_id' => 7, 'last_update' => '2026-05-07'],
        ]);
        DB::table('wishlist_polozka')->insert([
        ['wishlist_id' => 1, 'product_id' => 15],
        ['wishlist_id' => 2, 'product_id' => 1],
        ['wishlist_id' => 2, 'product_id' => 5],
        ['wishlist_id' => 3, 'product_id' => 25],
        ['wishlist_id' => 4, 'product_id' => 15],
        ['wishlist_id' => 5, 'product_id' => 15],
        ['wishlist_id' => 6, 'product_id' => 16],
        ['wishlist_id' => 6, 'product_id' => 17],
        ['wishlist_id' => 6, 'product_id' => 33],
        ['wishlist_id' => 6, 'product_id' => 24],
        ['wishlist_id' => 7, 'product_id' => 2],
        ['wishlist_id' => 7, 'product_id' => 7],
        ]);
    }
}
