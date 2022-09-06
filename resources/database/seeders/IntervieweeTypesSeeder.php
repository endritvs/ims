<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class IntervieweeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory 
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('interviewee_types')->insert([
        //         'name' => Str::random(10),

        //     ]);
        // }

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('interviewee_types')->insert([
                'name' => $faker->name,
            ]);
        }
    }
}