<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrokerSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(OfferingSeeder::class);
        $this->call(BankSeeder::class);

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AdminUserRoleTableSeeder::class);
    }
}
