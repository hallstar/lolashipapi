<?php

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminUser::findOrFail(1)->roles()->sync(1);
    }
}
