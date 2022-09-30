<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\RespondentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespondentController extends Controller
{
    public function insert(Request $request)
    {
        //validasi form data
        $request->validate([
            'unit_id' => 'required',
            'gender' => 'required',
            'education' => 'required',
        ]);



        //simpan data respondent
        $respondent = new Respondent();
        $respondent->unit_id = $request->unit_id;
        $respondent->gender = $request->gender;
        $respondent->education = $request->education;

        $respondent->save();


        $respondent_id =  $respondent->id;

        //loop for save detail respondent
        $list_respondent = $request->answers;
        foreach ($list_respondent as $detail) {

            //get question
            $question = Question::find($detail["question_id"]);
            if ($question) {
                $detail_respondent = new RespondentDetail();
                $detail_respondent->question_id = $detail["question_id"];
                $detail_respondent->answer = $detail["answer"];
                $detail_respondent->respondent_id = $respondent_id;
                $detail_respondent->questions_categorie_id = $question->questions_categorie_id;
                $detail_respondent->save();
            }
        }

        return $this->success("Jawaban telah dikumpulkan", null, 200);
    }

    public function index(Request $request, $date = "")
    {
        $current_year = Carbon::today()->format("Y");
        $current_month = Carbon::today()->format("m");

        if (empty($date)) {
            $date = Carbon::createFromFormat('m-Y', $date);
        } else {
            $current_year = Carbon::createFromFormat('m-Y', $date)->format('Y');
            $current_month = Carbon::createFromFormat('m-Y', $date)->format('m');

            $date = Carbon::createFromFormat('m-Y', $date)->format('F Y');
        }

        $datas = RespondentDetail::selectRaw("SUM(answer) as total_answer, COUNT(*) as total_data, (SUM(answer) / COUNT(*)) as rata_rata, ROUND(((SUM(answer) / COUNT(*)) * 0.111), 2 ) as ikm, questions_categorie_id")
            ->groupBy("questions_categorie_id")
            ->whereYear("created_at", $current_year)
            ->whereMonth("created_at", $current_month)
            ->with("category")
            ->get();


        $list_cart_name = array();
        $list_cart_value = array();

        $total_ikm = 0;
        $total_data_ikm = 0;
        $rata_rata_ikm = 0;

        foreach ($datas as $value) {
            array_push($list_cart_name, $value->category->name);
            array_push($list_cart_value, $value->ikm);

            $total_data_ikm += 1;
            $total_ikm += $value->ikm;
        }

        if ($total_ikm > 0) {
            $rata_rata_ikm = $total_ikm / $total_data_ikm;
        }


        $data["respondents"] = $datas;
        $data["list_cart_name"] = $list_cart_name;
        $data["list_cart_value"] = $list_cart_value;
        $data["rata_rata_ikm"] = $rata_rata_ikm;
        $data["selected_date"] = $date;

        return $this->success("Data Respondent $current_month $current_year", $data, 200);
    }
}
