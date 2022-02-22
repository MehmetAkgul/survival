<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_questions')->insert(
            [
                [
                     'question' => "En iyi  Ateş Yakma tekniği hangisidir?",
                    'surveyId' => 1,
                 ],
                [
                    'question' => "Ateşin yanması için sürtünmenin çıkarması gereken minimum ısı kaç derecedir?",
                    'surveyId' => 1,
                ],
                [
                    'question' => "son soru?",
                    'surveyId' => 1,
                ],
                [
                    'question' => "En iyi  Ateş Yakma tekniği hangisidir?",
                    'surveyId' => 2,
                ],
                [
                    'question' => "Ateşin yanması için sürtünmenin çıkarması gereken minimum ısı kaç derecedir?",
                    'surveyId' => 2,
                ],
                [
                    'question' => "son soru?",
                    'surveyId' => 2,
                ]
            ]
        );    }
}
