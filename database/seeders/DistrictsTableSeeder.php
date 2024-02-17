<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Faridabad',
                'code' => 'HRFB',
                'created_at' => '2023-10-31 15:51:27',
                'updated_at' => '2023-10-31 15:51:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hisar',
                'code' => 'HRHS',
                'created_at' => '2023-10-31 15:51:37',
                'updated_at' => '2023-10-31 15:51:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bhiwani',
                'code' => 'HRBHA',
                'created_at' => '2023-10-31 15:51:44',
                'updated_at' => '2023-10-31 15:51:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Gurgaon',
                'code' => 'HRGR',
                'created_at' => '2023-10-31 15:51:58',
                'updated_at' => '2023-10-31 15:51:58',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Karnal',
                'code' => 'HRKR',
                'created_at' => '2023-10-31 15:52:07',
                'updated_at' => '2023-10-31 15:52:07',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Sonipat',
                'code' => 'HRSO',
                'created_at' => '2023-10-31 15:52:18',
                'updated_at' => '2023-10-31 15:52:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Jind',
                'code' => 'HRJN',
                'created_at' => '2023-10-31 15:52:27',
                'updated_at' => '2023-10-31 15:52:27',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Sirsa',
                'code' => 'HRSI',
                'created_at' => '2023-10-31 15:52:40',
                'updated_at' => '2023-10-31 15:52:40',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Yamunanagar',
                'code' => 'HRYNA',
                'created_at' => '2023-10-31 15:52:47',
                'updated_at' => '2023-10-31 15:52:47',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Panipat',
                'code' => 'HRPP',
                'created_at' => '2023-10-31 15:52:56',
                'updated_at' => '2023-10-31 15:52:56',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Ambala',
                'code' => 'HRAM',
                'created_at' => '2023-10-31 15:53:04',
                'updated_at' => '2023-10-31 15:53:04',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'CHARKHI - DADRI',
                'code' => 'HRBHA',
                'created_at' => '2023-10-31 15:53:11',
                'updated_at' => '2023-10-31 15:53:11',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Kaithal',
                'code' => 'HRKH',
                'created_at' => '2023-10-31 15:53:20',
                'updated_at' => '2023-10-31 15:53:20',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Rohtak',
                'code' => 'HRRH',
                'created_at' => '2023-10-31 15:53:33',
                'updated_at' => '2023-10-31 15:53:33',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Palwal',
                'code' => 'HRPL',
                'created_at' => '2023-10-31 15:53:40',
                'updated_at' => '2023-10-31 15:53:40',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Kurukshetra',
                'code' => 'HRKU',
                'created_at' => '2023-10-31 15:53:57',
                'updated_at' => '2023-10-31 15:53:57',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Jhajjar',
                'code' => 'HRJR',
                'created_at' => '2023-10-31 15:54:15',
                'updated_at' => '2023-10-31 15:54:15',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Fatehabad',
                'code' => 'HRFT',
                'created_at' => '2023-10-31 15:54:27',
                'updated_at' => '2023-10-31 15:54:27',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Mahendragarh',
                'code' => 'HRNR',
                'created_at' => '2023-10-31 15:54:35',
                'updated_at' => '2023-10-31 15:54:35',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Rewari',
                'code' => 'HRRE',
                'created_at' => '2023-10-31 15:54:45',
                'updated_at' => '2023-10-31 15:54:45',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Panchkula',
                'code' => 'HRPK',
                'created_at' => '2023-10-31 15:54:53',
                'updated_at' => '2023-10-31 15:54:53',
            ),
        ));
        
        
    }
}