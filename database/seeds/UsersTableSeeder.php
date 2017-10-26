<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'first_name' => 'Juan',
        	'last_name' => 'Dela Cruz',
        	'email' => 'juandelacruz@gmail.com',
        	'password' => bcrypt('secret123'),
        	'country' => 'Philippines',
        	'address' => 'Somewhere down the road', 
        	'city' => 'That Never Sleep',
        	'zip_code' => '1234', 
        	'phone_number' => '09123456789'
        ]);
    }
}
