<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};
use App\Models\{Order, User, OrderStateLang};

class OrdersTableSeeder extends Seeder
{
    protected $users;
    protected $orderStateLangs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetchRelations();

        foreach(range(1, 50) as $i) {
            $this->createRandomOrder();
        }
    }

    protected function fetchRelations()
    {
        $this->users = User::all();
        $this->orderStateLangs = OrderStateLang::all();
    }

    protected function createRandomOrder()
    {
        $order = factory(Order::class)->create([
            'user_id' => $this->users->random()->id,
            'order_state_lang_id' => $this->orderStateLangs->random()->id,
            'created_at' => now()->subDays(rand(1, 240)),
        ]);
    }
}
