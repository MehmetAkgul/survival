<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Models\UserResult;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    public function getCheck(Request $request)
    {


        $ip = $request->ip(); //ip'ya bak
        $c = UserResult::where("ip", $ip)->where('surveyId', $request->surveyId)->count(); // ip varsa
        $totalQ = SurveyQuestion::where("surveyId", $request->surveyId)->count();
        if ($totalQ == 0) {
            return json_encode(array("status" => 5)); // "sorular yüklenmemiş";
        }
        if ($c > 0) {
            $totalQ = SurveyQuestion::where("surveyId", $request->surveyId)->count();

            $data = SurveyQuestion::select("id")
                ->where("surveyId", $request->surveyId)
                ->whereNotIn("id", function ($query) use ($request, $ip) {
                    $query->selectRaw('surveyQId as id')
                        ->from('user_results')
                        ->where('surveyId', $request->surveyId)
                        ->where('ip', $ip);
                });
            $remaninIds = $data->get();
            $remainQ = $data->count();


            if ($remainQ == 0) {
                return json_encode(array("status" => 1)); //sonucu göster
            } elseif ($remainQ > 0) {

                return json_encode(array("status" => 2, "totalQ" => $totalQ, "remainQ" => $remainQ, "ids" => $remaninIds));

                // "kaldığı sorudan devam et";
            }
        } else {
            return json_encode(array("status" => 3)); // "ankete başla";
        }


    }

    public function getSurveyCount(Request $request)
    {
        $totalQ = SurveyQuestion::where("surveyId", $request->surveyId)->count();

        $data = SurveyQuestion::select("id")
            ->where("surveyId", $request->surveyId)
            ->whereNotIn("id", function ($query) use ($request) {
                $query->selectRaw('surveyQId as id')
                    ->from('user_results')
                    ->where('surveyId', $request->surveyId);
            });
        $remaninIds = $data->get();
        $remainQ = $data->count();
        return json_encode(array("totalQ" => $totalQ, "remainQ" => $remainQ, "ids" => $remaninIds));
    }

    public
    function surveyStore(Request $request)
    {
        $all = $request->except('_token');
        $ip = $request->ip();
        $all['ip'] = $ip;


        $all['totalQuestion'] = SurveyQuestion::where("id", $request->surveyId)->count();
        $all['check'] = SurveyAnswer::where("id", $request->answerId)->first()->check;
        $create = UserResult::create($all);

        if ($create) {
            return "başarılı";
        } else {
            return json_encode($all) . "Bir hata oluştu";
        }


    }


    public function getSurvey(Request $request)
    {


        $totalQ = SurveyQuestion::where("surveyId", $request->surveyId)->count();
        $c = Survey::where("id", $request->surveyId)->count();
        if ($c != 0) {
            $survey = SurveyQuestion::with("answer")
                ->where("surveyId", $request->surveyId)
                ->whereNotIn("id", function ($query) use ($request) {
                    $query->selectRaw('surveyQId as id')
                        ->from('user_results')
                        ->where('surveyId', $request->surveyId);
                });
            $data = $survey->first();;
            $remainQ = $survey->count();
            return json_encode(array("totalQ" => $totalQ, "remainQ" => $remainQ, "data" => $data));
        } else {
            return null;
        }

    }

    public function getResult(Request $request)
    {

        $ip = $request->ip(); //ip'ya bak
        $data = UserResult::where("ip", $ip)
            ->where("surveyId", $request->surveyId);

        $totalQuestion = $data->first()->totalQuestion;
        $totalAnswer = $data->count();
        $correctAnswer = $data->where("check", 1)->count();


        $survey = Survey::where("id", $request->surveyId)->first();

        $result['name'] = $survey->name;
        $result['img'] = $survey->img;
        $result['text'] = $survey->text;
        $result['title'] = $survey->title;

        $result['totalAnswer'] = $totalAnswer;
        $result['correctAnswer'] = $correctAnswer;
        $result['totalQuestion'] = $totalQuestion;
        $result['rate'] = round((($correctAnswer / $totalAnswer) * 100), 0);

        return json_encode($result);

    }

}
