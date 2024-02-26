<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();

        $name = ['user','admin','Narang','HQ Admin','Ram Niwas','Dhurender','Basti Ram','Devender Singh','Raj Bala','Sandhu Bala','Jagdeep','Lalita','Kuldeep Singh','Suman Malik','Sudha Bhasin','Satinder Kumar','Ved Parkash','Manoj Kumar','Anil Kumar','Neel Kamal','Satender','Madan Lal','Anoop','Shamsher Singh','Sharmila','Shilpa Gupta'];
        $email = ['dso@gmail.com','admin@gmail.com','narang@gmail.com','sports@gmail.com','dsoamb@gmail.com','dsobhw@gmail.com','dsochdadri@gmail.com','dsofbd@gmail.com','dsofhb@gmail.com','dsoggn7@gmail.com','dsohsr@gmail.com','dsojjr@gmail.com','dsojnd@gmail.com','dsokth@gmail.com','dsoknl@gmail.com','dsokkr@gmail.com','dsomwt@gmail.com','dsonrnl@gmail.com','dsopwl@gmail.com','dsopkl0@gmail.com','dsopnt@gmail.com','dsorwr@gmail.com','dsortk@gmail.com','dsosirsa@gmail.com','dsosnp@gmail.com','dsoynagar@gmail.com'];
        $mobile =['9459821433','7807069793','9646096546','9999378678','9899896181','8307096639','9466234308','9896264601','9354130551','9992062068','9467069842','9034559896','9996549814','9813113363','7015019471','9215107575','9354935424','7015537570','9468443550','9816675678','9215107575','7027147007','9996549814','9416481963','9813516463','7988343752'];
        $district_id =[1,null,null,null,11,3,12,1,18,4,2,17,7,13,5,16,22,23,15,21,10,20,14,8,6,9];

        $secureIds = [];
        $userData = [];


        foreach ($name as $index => $userName) {
            $secureId = Str::uuid();
            while (in_array($secureId, $secureIds)) {
                $secureId = Str::uuid();
            }
            $secureIds[] = $secureId;

            $userData[] = [
                'secure_id' => $secureId,
                'name' => $userName,
                'email' => $email[$index],
                'mobile' => $mobile[$index],
                'district_id' => $district_id[$index],
            ];
        }

        DB::table('users')->insert($userData);
    }
}
