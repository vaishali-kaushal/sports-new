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
        DB::table('coach_qualifications')->truncate();
        $qualifications = [
            'Diploma holders from NIS Patiala or any Institute recognised by the Ministry of Youth Affairs and Sports as equivalent to NIS Patiala in the concerned game',
            'Senior International Medalist in the concerned game',
            'NIS Certificate Course in the concerned game',
            'M.P.Ed. In this case, the person must also be a National/All India University Player in the concerned game',
            'B.P.Ed. In this case, the person must also be a National/All India University Player in the concerned game',
            'D.P.Ed. In this case, the person must also be a National/All India University Player in the concerned game',
            'Junior INternational Medallist in the concerned game with minimum qualification 10+2'
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
