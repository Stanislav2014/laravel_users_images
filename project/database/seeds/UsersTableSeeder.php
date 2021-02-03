<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {

            $user = new User();

            $user->name = Str::random(10);
            $user->email = Str::random(10).'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();

        }


    }
}
