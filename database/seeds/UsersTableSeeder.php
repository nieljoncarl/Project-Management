<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $officerRole = Role::where('name','officer')->first();
        $staffRole = Role::where('name','staff')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password')
        ]);

        $officer = User::create([
            'name' => 'Officer User',
            'email' => 'officer@test.com',
            'password' => Hash::make('password')
        ]);

        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@test.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $officer->roles()->attach($officerRole);
        $staff->roles()->attach($staffRole);
    }
}
