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

        DB::table('games')->truncate();

        DB::table('games')->insert([
             [ 
              'name' => 'Archery'],
             [
                'name' => 'Athletics'],
             [
                'name' => 'Badminton'],
             [
                'name' => 'Baseball'],
             [
                'name' => 'Basketball'],
             [
                'name' => 'Boxing'],
             [
                'name' => 'Canoeing'],
             [
                'name' => 'Cycling'],
             [
                'name' => 'Fencing'],
             [
                'name' => 'Football'],
             [
                'name' => 'Gymnastics'],
             [
                'name' => 'Handball'],
             [
                'name' => 'Hockey'],
             [
                'name' => 'Judo'],
             [
                'name' => 'Kabaddi'],
             [
                'name' => 'Lawn Tennis'],
              [
                'name' => 'Netball'],
             [
                'name' => 'Rowing'],
             [
                'name' => 'Shooting'],
             [
                'name' => 'Softball'],
             [
                'name' => 'Swimming'],
             [
                'name' => 'Table-Tennis'],
             [
                'name' => 'Taekwondo'],
             [
                'name' => 'Volleyball'],
             [
                'name' => 'Weightlifting'],
             [
                'name' => 'Wrestling'],
             [
                'name' => 'Wushu']


        ]);
    }
}
