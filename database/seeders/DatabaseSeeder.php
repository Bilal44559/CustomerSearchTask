<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = Customer::factory(100)->create();
        $items = Item::factory(100)->create();

        $customers->each(function ($customer) use ($items) {
            $orders = Order::factory(rand(1, 5))->create([
                'customer_id' => $customer->id,
            ]);

            $orders->each(function ($order) use ($items) {
                $order->items()->attach(
                    $items->random(rand(1, 5))->pluck('id')->toArray(),
                    ['quantity' => rand(1, 10)]
                );
            });
        });
    }
}
