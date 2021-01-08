<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $seeders = [
        CountriesTableSeeder::class,
        AddressTableSeeder::class,
        UsersTableSeeder::class,
        ProductsTableSeeder::class,
        OrderStateLangTableSeeder::class,
        OrdersTableSeeder::class,
        OrderDetailsTableSeeder::class,
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'country_langs',
            'addresses',
            'users',
            'order_state_langs',
            'products',
            'orders',
            'order_details',
        ]);

        $progress = $this->command
                        ->getOutput()
                        ->createProgressBar(count($this->seeders));

        $progress->start();

        foreach ($this->seeders as $seeder) {
            $this->call($seeder, true);
            $progress->advance();
        }
        $progress->finish();
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
