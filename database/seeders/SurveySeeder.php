<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert(
            [
                [
                    'img' => "assets/img/resim1.png",
                    'name' => "Sürtünmeyle Ateş Yakma",
                    'title' => "YETENEKLER",
                    'text' => Str::random(30),

                ],
                [
                    'img' => "assets/img/resim2.png",
                    'name' => "Kendine Sığınak Yap",
                    'title' => "YETENEKLER",
                    'text' => Str::random(30),

                ],
                [
                    'img' => "assets/img/resim3.png",
                    'name' => "Ormanda Kendine Bir Öğün Hazırla",
                    'title' => "YETENEKLER",
                    'text' => Str::random(30),

                ]
            ]
        );
    }
}
