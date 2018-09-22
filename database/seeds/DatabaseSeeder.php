<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
    
=======
     /*   DB::table('users')->insert([
            
        ]); */
>>>>>>> refs/remotes/origin/master
    }
}
