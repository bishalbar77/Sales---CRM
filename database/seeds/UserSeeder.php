<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $super = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'phone' => '7485962587',
            'user' => '0',
            'district' => 'Sundergarh',
            'country' => 'India',
            'state' => 'Odisha',
            'city' => 'BBSR',
            'pincode' => '769004',
            'user_type' => 'Admin',
            'address' => 'DL/4, Civil Township',
            'password' => Hash::make('admin')
        ]);
    }
}
