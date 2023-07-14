<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->CreatePermissions();
    }
    //User
    public function createRoles(){
        $roleSuperAdmin = Role::create([
            'name' => 'superadmin', 'display_name' => 'Super Admin'
        ]);

        $roleAdmin  = Role::create([
            'name' => 'admin', 'display_name' => 'Super Admin'
        ]);
        $roleSeeker = Role::create([
            'name' => 'seeker', 'display_name' => 'Seeker'
        ]);
# Create User => super Admin
        $createUserSuperAdmin = User::create([
            'name' => 'admin',
            'email' => 'phou@gmail.com',
            'password' => Hash::make('lee@2023g'),
        ]);
        $createUserSuperAdmin->attachRoles([$roleSuperAdmin]);

        $createUserAdmin = User::create([
            'name' => 'admin',
            'email' => 'lee@gmail.com',
            'password' => Hash::make('phou@2023g'),
        ]);
        $createUserAdmin->attachRoles([$roleAdmin]);

        $createSeeker = User::create([
            'name' => 'seeker',
            'email' => 'seeker@gmail.com',
            'password' => Hash::make('seeker@2023g')
        ]);
        $createSeeker->attachRoles([$roleSeeker]);

        $createSeeker2 = User::create([
            'name' => 'seeker 2',
            'email' => 'seeker2@gmail.com',
            'password' => Hash::make('seeker2@2023g')
        ]);
        $createSeeker2->attachRoles([$roleSeeker]);


    }

    public function CreatePermissions(){
        Permission::create(['name' => 'add', 'display_name' => 'Add']);
        Permission::create(['name' => 'edit', 'display_name' => 'edit']);
        Permission::create(['name' => 'view', 'display_name' => 'view']);
        Permission::create(['name' => 'delete', 'display_name' => 'delete']);

    }
}
