<?php

use Illuminate\Support\Str;
use App\Models\{Order, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};

class OrdersTableSeeder extends Seeder
{
    protected $users;

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
    }

    protected function createRandomOrder()
    {
        $order = factory(Order::class)->create([
            'user_id' => $this->users->random()->id,
            'created_at' => now()->subDays(rand(1, 240)),
        ]);
    }
}
