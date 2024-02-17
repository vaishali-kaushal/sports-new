<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $table->string('name');
        // $table->string('email')->unique();
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');

        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'secure_id' => '0e7ee980002a1261d04d102d988f4f6b',
                'name' => 'user',
                'email' => 'dso@gmail.com',
                'email_verified_at' => '1',
                'mobile' => '9459821433',
                'mobile_verified_at' => '1',
                'password' =>Hash::make('dso@123'),
                "district_id" =>1,
         
            ),
            1 =>
            array(
                'id' => 2,
                'secure_id' => '0e7ee980072a1261d023d102d988f4f6b',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '1',
                'mobile' => '7807069793',
                'mobile_verified_at' => '1',
                'password' =>Hash::make('admin@123'),
                "district_id" =>null,

            ),
            


        ));
    }
}
