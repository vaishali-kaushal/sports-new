<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('role_types')->delete();

        DB::table('role_types')->insert([
            0 =>['user_id' => '1','role_id' => '2'],
            1 =>['user_id' => '2','role_id' => '1'],
            2 =>['user_id' => '3','role_id' => '1'],
            3 =>['user_id' => '4','role_id' => '1'],

            4 =>['user_id' => '5','role_id' => '2'],
            5 =>['user_id' => '6','role_id' => '2'],
            6 =>['user_id' => '7','role_id' => '2'],
            7 =>['user_id' => '8','role_id' => '2'],
            8 =>['user_id' => '9','role_id' => '2'],
            9 =>['user_id' => '10','role_id' => '2'],
            10 =>['user_id' => '11','role_id' => '2'],
            11 =>['user_id' => '12','role_id' => '2'],
            12 =>['user_id' => '13','role_id' => '2'],
            13 =>['user_id' => '14','role_id' => '2'],
            14 =>['user_id' => '15','role_id' => '2'],
            15 =>['user_id' => '16','role_id' => '2'],
            16 =>['user_id' => '17','role_id' => '2'],
            17 =>['user_id' => '18','role_id' => '2'],
            18 =>['user_id' => '19','role_id' => '2'],
            19 =>['user_id' => '20','role_id' => '2'],
            20 =>['user_id' => '21','role_id' => '2'],
            21 =>['user_id' => '22','role_id' => '2'],
            22 =>['user_id' => '23','role_id' => '2'],
            23 =>['user_id' => '24','role_id' => '2'],
            24 =>['user_id' => '25','role_id' => '2'],
            25 =>['user_id' => '26','role_id' => '2']
        ]);
    }
}
