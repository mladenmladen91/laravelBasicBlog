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
        App\User::create([
           'name'=>'Mladen',
            'email'=> 'admin91@gmail.com',
            'password'=>bcrypt('admin91') 
            
        ]);

}
