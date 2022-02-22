<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'img' => "assets/img/1.png",
                    'title' => "KENDINI SINA",
                    'subTitle' => "ZORLU KOŞULLARDA1",
                    'text' => Str::random(30),
                    'order' => 1,
                ],
                [
                    'img' => "assets/img/1.png",
                    'title' => "KENDINI SINA",
                    'subTitle' => "ZORLU KOŞULLARDA2",
                    'text' => Str::random(30),
                    'order' => 2,
                ],
                [
                    'img' => "assets/img/1.png",
                    'title' => "KENDINI SINA",
                    'subTitle' => "ZORLU KOŞULLARDA3",
                    'text' => Str::random(30),
                    'order' => 3,
                ]
            ]
        );
    }
}
