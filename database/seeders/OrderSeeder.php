<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create test categories
        $categories = [
            ['name' => 'Women', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Men', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kid', 'created_at' => now(), 'updated_at' => now()],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create a test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'role' => 'User',
            'address' => '123 Test St',
            'phone' => '1234567890',
        ]);

        // Create test products
        $product1 = Product::create([
            'name' => 'T-Shirt',
            'code' => 'TS001',
            'purchase_price' => 10.00,
            'sale_price' => 15.00,
            'stock' => 100,
            'category_id' => 1, // Women
            'description' => 'A comfortable t-shirt',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $product2 = Product::create([
            'name' => 'Jeans',
            'code' => 'JN001',
            'purchase_price' => 20.00,
            'sale_price' => 30.00,
            'stock' => 50,
            'category_id' => 2, // Men
            'description' => 'Stylish jeans',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a test order
        $order = Order::create([
            'order_id' => 'ORD' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT),
            'user_id' => $user->id,
            'ordered_date' => now(),
            'status' => 'Pending',
            'total_amount' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create order products
        $orderProduct1 = OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product1->id,
            'quantity' => 2,
            'unit_price' => $product1->sale_price,
            'total_price' => 2 * $product1->sale_price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $orderProduct2 = OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product2->id,
            'quantity' => 1,
            'unit_price' => $product2->sale_price,
            'total_price' => 1 * $product2->sale_price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update total amount in order
        $order->update(['total_amount' => $orderProduct1->total_price + $orderProduct2->total_price]);
    }
}