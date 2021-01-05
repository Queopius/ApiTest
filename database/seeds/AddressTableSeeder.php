<?php

use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};

class AddressTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach(range(1, 50) as $i) {
			$this->createRandomUser();
		}
	}

	protected function createRandomUser()
	{
		factory(Address::class, 50)->create();
	}
}
