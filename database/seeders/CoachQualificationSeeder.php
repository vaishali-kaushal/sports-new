<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoachQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualifications = [
            'Diploma Holders from NIS Patiala or any institute recognised by the Ministry of Affairs & Sports as equivalent to NIS Patiala',
            'Senior International Player',
            'NIS Certificate Course',
            'M.P.Ed.',
            'M.A. (Physical Education)',
            'D.P.Ed.',
            'Junior International Player in the concerned Game',
            'National Player in the concerned Game',
            'All India Inter-University player in the concerned Game',
        ];

        // Coach fees data
        $fees = [25000,25000,20000,20000,20000,20000,20000,20000,20000];
        $qual_cat = [1,1,2,2,2,2,2,2,2,2];

        for ($i = 0; $i < count($qualifications); $i++) {
	        DB::table('coach_qualifications')->insert([
	            'name' => $qualifications[$i],
	            'qual_cat' => $qual_cat[$i],
	            'coach_fee' => $fees[$i]
	        ]);
	    }

    }
}
