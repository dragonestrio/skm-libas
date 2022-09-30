<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Respondent;
use App\Models\RespondentDetail;
use Illuminate\Http\Request;

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

            $detail_respondent = new RespondentDetail();
            $detail_respondent->question_id = $detail["question_id"];
            $detail_respondent->answer = $detail["answer"];
            $detail_respondent->respondent_id = $respondent_id;
            $detail_respondent->save();
        }

        return $this->success("Jawaban telah dikumpulkan", null, 200);
    }
}
