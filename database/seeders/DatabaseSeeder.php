<?php

namespace Database\Seeders;
use App\Models\User;

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
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name'=>'Vice Chancellor',
                'email'=>'vc@gmail.com',
                'is_permission'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Registrar',
                'email'=>'reg@gmail.com',
                'is_permission'=>'2',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Assistant Registrar Of The Faculty',
                'email'=>'ar@gmail.com',
                'is_permission'=>'3',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Student Affairs Division Clerk',
                'email'=>'stdaff@gmail.com',
                'is_permission'=>'4',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Finance Division Clerk',
                'email'=>'fin@gmail.com',
                'is_permission'=>'5',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Student',
                'email'=>'std@gmail.com',
                'is_permission'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
