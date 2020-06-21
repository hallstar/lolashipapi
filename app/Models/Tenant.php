<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = [

        'subdomain','name','is_active', 'default_email',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function createWithUser($data)
    {
        $tenant = self::create([
            'subdomain'=>$data['subdomain'],
            'name'  => $data['company'],
            'is_active' => false,
            'default_email' => $data['email'],
        ]);

        $tenant->hash = md5($tenant->id.$tenant->subdomain).time();
        $tenant->save();

        $tenant->users()->create([
            'firstname' =>$data['firstname'],
            'lastname' => $data['lastname'],
            'email'    => $data['email'],
            'password' => \Hash::make($data['password']),
            'is_customer'   => false,
            'tenant_id' => $tenant->id,
            'verify_hash'   => $tenant->hash,
        ]);
        //assign a role to this user
        //dispatch email
    }

}
