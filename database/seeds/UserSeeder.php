<?php

use App\Components\User\Models\Group;
use App\Components\User\Models\Permission;
use App\Components\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create the super user permission
        $permissionSuperUser = Permission::create([
            'title' => 'Super User',
            'description' => 'Superuser permission',
            'key' => Permission::SUPER_USER_PERMISSION_KEY,
        ]);

        // create the merchant permission
        $permissionMerchant = Permission::create([
            'title' => 'Merchant',
            'description' => 'Merchant permission',
            'key' => Permission::MERCHANT_PERMISSION_KEY,
        ]);

        // create all other permissions
        $permissionSample1 = Permission::create([
            'title' => 'User Create',
            'description' => 'Permission to create user. This is an example permission only',
            'key' => 'user.create',
        ]);
        $permissionSample2 = Permission::create([
            'title' => 'User Edit',
            'description' => 'Permission to edit user. This is an example permission only',
            'key' => 'user.edit',
        ]);
        $permissionSample3 = Permission::create([
            'title' => 'User Delete',
            'description' => 'Permission to delete user. This is an example permission only',
            'key' => 'user.delete',
        ]);

        // create super user group
        $groupSuperUser = Group::create([
            'name' => Group::SUPER_USER_GROUP_NAME,
            'permissions' => [
                [
                    'title' => 'Super User',
                    'description' => 'Superuser permission',
                    'key' => Permission::SUPER_USER_PERMISSION_KEY,
                    'value' => 1
                ]
            ]
        ]);
        $groupSuperUser->addPermission($permissionSuperUser,Permission::PERMISSION_ALLOW);

        // create merchant group
        $groupMerchant = Group::create([
            'name' => Group::MERCHANT_GROUP_NAME,
            'permissions' => [
                [
                    'title' => 'Merchant',
                    'description' => 'Merchant permission',
                    'key' => Permission::MERCHANT_PERMISSION_KEY,
                    'value' => 1
                ]
            ]
        ]);
        $groupMerchant->addPermission($permissionMerchant,Permission::PERMISSION_ALLOW);

        // create normal user
        $groupDefaultUser = Group::create([
            'name' => Group::DEFAULT_USER_GROUP_NAME,
            'permissions' => []
        ]);

        // generate random users
        $users = factory(User::class,30)->create();
        $users->each(function($u) use ($groupDefaultUser)
        {
            $u->groups()->attach($groupDefaultUser);
        });

        // create admin account
        $AdminUser = User::create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'remember_token' => str_random(10),
            'permissions' => [],
            'last_login' => \Carbon\Carbon::now(),
            'active' => \Carbon\Carbon::now(),
            'activation_key' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);

        // make merchant
        $AdminUser->groups()->attach($groupSuperUser);

        // create merchant account
        $Merchant = User::create([
            'name' => 'Ally Hoffman',
            'email' => 'merchant@gmail.com',
            'password' => '12345678',
            'remember_token' => str_random(10),
            'permissions' => [],
            'last_login' => \Carbon\Carbon::now(),
            'active' => \Carbon\Carbon::now(),
            'activation_key' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);

        // make merchant
        $Merchant->groups()->attach($groupMerchant);
    }
}
