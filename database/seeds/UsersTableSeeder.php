<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\{User, CountryLang, Address};
use Illuminate\Support\Facades\{DB, Hash};

class UsersTableSeeder extends Seeder
{
	protected $countries;
	protected $addresses;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->fetchRelations();

		foreach(range(1, 50) as $i) {
			$this->createRandomUser();
		}
	}

	protected function fetchRelations()
	{
		$this->countries = CountryLang::all();
        $this->addresses = Address::all();
	}

	protected function createRandomUser()
	{
		$user = factory(User::class)->create([
			'created_at' => now()->subDays(rand(1, 60)),
			'country_lang_id' => $this->countries->random()->id,
            'address_id' => $this->addresses->random()->id,
		]);
	}
}
