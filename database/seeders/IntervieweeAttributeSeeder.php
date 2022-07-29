<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class IntervieweeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('interviewee_attributes')->insert([
                'name' => $faker->name,
                'interviewee_types_id' => $index
            ]);
        }
    }
}