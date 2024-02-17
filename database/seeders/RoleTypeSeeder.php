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

        DB::table('role_types')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_id' => '1',
                'role_id' => '2',
            ),
            1 =>
            array(
                'id' => 2,
                'user_id' => '2',
                'role_id' => '1',
            ),
        


        ));
    }
}
