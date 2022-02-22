<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SurveyAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_answers')->insert(
            [
                [
                    'answer' => "A tekniği",
                    'surveyQId' => 1,
                    'check' => true,
                ],
                [
                    'answer' => "B tekniği",
                    'surveyQId' => 1,
                    'check' => false,
                ],
                [
                    'answer' => "C tekniği",
                    'surveyQId' => 1,
                    'check' => false,
                ],
                [
                    'answer' => "300 derece",
                    'surveyQId' => 2,
                    'check' => false,
                ],
                [
                    'answer' => "400 derece",
                    'surveyQId' => 2,
                    'check' => true,
                ],
                [
                    'answer' => "500 derece",
                    'surveyQId' => 2,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 3,
                    'check' => true,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 3,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 3,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 4,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 4,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 4,
                    'check' => true,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 5,
                    'check' => true,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 5,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 5,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 6,
                    'check' => true,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 6,
                    'check' => false,
                ],
                [
                    'answer' => Str::random(10),
                    'surveyQId' => 6,
                    'check' => false,
                ]
            ]
        );
    }
}
