<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('games')->delete();

        DB::table('games')->insert(array(
            array(
                'id' => 1,
                'name' => 'Archery'
              ),
              array(
                'id' => 2,
                'name' => 'Athletics'
              ),
              array(
                'id' => 3,
                'name' => 'Badminton'
              ),
              array(
                'id' => 5,
                'name' => 'Basketball'
              ),
              array(
                'id' => 6,
                'name' => 'Boxing'
              ),
              array(
                'id' => 8,
                'name' => 'Cricket'
              ),
              array(
                'id' => 9,
                'name' => 'Cycling'
              ),
              array(
                'id' => 10,
                'name' => 'Equestrian'
              ),
              array(
                'id' => 11,
                'name' => 'Fencing'
              ),
              array(
                'id' => 12,
                'name' => 'Football'
              ),
              array(
                'id' => 13,
                'name' => 'Gymnastics'
              ),
              array(
                'id' => 14,
                'name' => 'Handball'
              ),
              array(
                'id' => 15,
                'name' => 'Hockey'
              ),
              array(
                'id' => 16,
                'name' => 'Indoor Hall'
              ),
              array(
                'id' => 17,
                'name' => 'Judo'
              ),
              array(
                'id' => 18,
                'name' => 'Kabaddi'
              ),
              array(
                'id' => 19,
                'name' => 'Kho-Kho'
              ),
              array(
                'id' => 20,
                'name' => 'Korfball'
              ),
              array(
                'id' => 21,
                'name' => 'Lawn Tennis'
              ),
              array(
                'id' => 22,
                'name' => 'Martial Arts'
              ),
              array(
                'id' => 23,
                'name' => 'Shooting'
              ),
              array(
                'id' => 24,
                'name' => 'Skating'
              ),
              array(
                'id' => 25,
                'name' => 'Squash'
              ),
              array(
                'id' => 26,
                'name' => 'Swimming'
              ),
              array(
                'id' => 27,
                'name' => 'Table Tennis'
              ),
              array(
                'id' => 28,
                'name' => 'Taekwondo'
              ),
              array(
                'id' => 29,
                'name' => 'Volleyball'
              ),
              array(
                'id' => 30,
                'name' => 'Weightlifting'
              ),
              array(
                'id' => 31,
                'name' => 'Wrestling'
              ),
              array(
                'id' => 32,
                'name' => 'Wushu'
              ),
              array(
                'id' => 33,
                'name' => 'Yoga'
              ),
              array(
                'id' => 34,
                'name' => 'Others'
              )


        ));
    }
}
