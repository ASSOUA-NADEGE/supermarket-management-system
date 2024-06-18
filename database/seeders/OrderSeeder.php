<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(30)
            ->hasAttached(
                Product::query()->inRandomOrder()->limit(rand(3, 7))->get(),
                ['quantity' => rand(3, 7)]
            )
            ->create();
    }
}
