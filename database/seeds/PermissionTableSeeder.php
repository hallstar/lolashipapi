<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            // Permissions
            "permission_create",
            "permission_edit",
            "permission_show",
            "permission_delete",
            "permission_access",

            // Roles
            "role_create",
            "role_edit",
            "role_show",
            "role_delete",
            "role_access",

            // User
            "user_create",
            "user_edit",
            "user_show",
            "user_delete",
            "user_access",
        ];

        foreach($titles as $title)
        {
            Permission::updateOrCreate([
                'title' => $title
            ]);
        }
    }
}
