<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleGroup extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('role_groups')->truncate();

        DB::table('role_groups')->insert(array(
            0 =>
            array(
                'id' => 1,
                'role_name' => 'admin',
            ),
            1 =>
            array(
                'id' => 2,
                'role_name' => 'dso',
            ),
            2 =>
            array(
                'id' => 3,
                'role_name' => 'coach',

            ),
            3 =>
            array(
                'id' => 4,
                'role_name' => 'player',
            ),
            4 =>
            array(
                'id' => 5,
                'role_name' => 'nursery',
            ),


        ));
    }
}
