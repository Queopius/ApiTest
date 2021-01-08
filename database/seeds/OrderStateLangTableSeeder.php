<?php

use App\Models\OrderStateLang;
use Illuminate\Database\Seeder;

class OrderStateLangTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		OrderStateLang::create([
            'name' => 'cancel'
        ]);

        OrderStateLang::create([
            'name' => 'paid'
        ]);

        OrderStateLang::create([
            'name' => 'errorInPay'
        ]);

        OrderStateLang::create([
            'name' => 'delivered'
        ]);

        OrderStateLang::create([
            'name' => 'papendingOrderDueToLackOfStockid'
        ]);

        OrderStateLang::create([
            'name' => 'paymentAccepted'
        ]);

        OrderStateLang::create([
            'name' => 'waitingForPaymentByPaypal'
        ]);

        OrderStateLang::create([
            'name' => 'waitingForPaymentByStripe'
        ]);

        OrderStateLang::create([
            'name' => 'refunded'
        ]);
	}
}
