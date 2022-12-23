<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
            'name'=>'ayowande',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('adminadmin'),
            'activation_token'=> '',
            'is_active'=>1]);

        factory(User::class,10)->create();
    }
}
