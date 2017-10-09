<?php

use Illuminate\Database\Seeder;

class admin_usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_users')->insert([
            'username' => "admin",
            'password' => bcrypt('admin'),
            'email' => 'occurto@live.com',
            'phone' => '13665600048',
            'gender' => '1',
        ]);
    }
}
