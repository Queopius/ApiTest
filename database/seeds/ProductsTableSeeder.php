<?php

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 100) as $i) {
            $this->createRandomProduct();
        }
    }

    protected function createRandomProduct()
    {
        $product = factory(Product::class)->create([
            'created_at' => now()->subDays(rand(1, 100)),
        ]);
    }
}
