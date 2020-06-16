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
            // Offer
            "offer_access",
            "offer_create",
            "offer_show",
            "offer_edit",
            "offer_delete",

            // Bank
            "bank_access",
            "bank_create",
            "bank_show",
            "bank_edit",
            "bank_delete",

            // Broker
            "broker_access",
            "broker_create",
            "broker_show",
            "broker_edit",
            "broker_delete",

            // Currency
            "currency_access",
            "currency_create",
            "currency_show",
            "currency_edit",
            "currency_delete",

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
