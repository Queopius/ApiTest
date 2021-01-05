<?php

use Illuminate\Database\Seeder;
use App\Models\{OrderDetail, Product, Order};

class OrderDetailsTableSeeder extends Seeder
{
    protected $products;
    protected $orders;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetchRelations();

        foreach(range(1, 50) as $i) {
            $this->createRandomOrderDetails();
        }
    }

    protected function fetchRelations()
    {
        $this->products = Product::all();
        $this->orders = Order::all();
    }

    protected function createRandomOrderDetails()
    {
        $order_details = factory(OrderDetail::class)->create([
            'active' => rand(0, 2) ? 1 : 0,
            'product_id' => $this->products->random()->id,
            'order_id' => $this->orders->random()->id,
        ]);
    }
}
