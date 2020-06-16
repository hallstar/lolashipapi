<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminUser::firstOrCreate([
            'id'            => 1,
        ],  [
            'first_name'    => 'Romario',
            'last_name'     => 'Hall',
            'email'         => 'romario@orba.io',
            'password'      => Hash::make('password'),
        ]);
    }
}
