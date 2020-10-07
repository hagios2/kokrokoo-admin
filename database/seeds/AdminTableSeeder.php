<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('role', 'super_admin')->first();

        Admin::create([

            'name' => 'Nana Banyin Daniels',

            'email' => 'nab.daniels@gmail.com',

            'phone' => '0206535897',

            'title' => 'CEO',

            'status' => 'active',

            'role_id' => $role->id,

            'password' => Hash::make('123456')

        ]);
    }
}
