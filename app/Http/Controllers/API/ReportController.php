<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Questions_category;
use App\Models\Report;
use App\Models\Respondent;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // public function index(Request $request, Api $api)
    // {
    //     $reports = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
    //         ->join('questions', 'questions.id', 'reports.question_id')
    //         ->join('units', 'units.id', 'respondents.unit_id')
    //         ->latest('reports.created_at')
    //         ->select(
    //             'reports.*',
    //             'respondents.unit_id as respondents_unit_id',
    //             'respondents.gender as respondents_gender',
    //             'respondents.education as respondents_education',
    //             'units.name as units_name',
    //             'questions.name as questions_name',
    //             'questions.questions_categorie_id as question_category'
    //         );

    //     if ($request->input('search')) {
    //         $reports
    //             ->where('units.name', 'like', '%' . $request->input('search') . '%')
    //             ->orwhere('questions.name', 'like', '%' . $request->input('search') . '%')
    //             ->orwhere('reports.result', 'like', '%' . $request->input('search') . '%');
    //     }

    //     if (count($request->input()) == 0) {
    //         $data = $reports->get();
    //     } else {
    //         $data = $reports->paginate(8);
    //     }


    // $cache_name = 'reportCache';
    // $cache = cache($cache_name);
    // Cache::put($cache_name, $data, now()->addMinutes(strtotime('5 minutes')));
    //     return $api->responseSuccess('Quesioner Report', $data);
    // }

    public function report(Request $request, Api $api, Unit $unit, $date = null)
    {
        if ($date == null) {
            $date = date('m-Y', time());
            $date_query = $date;
        } else {
            $dates = explode('-', $date);
            if (strlen($dates[0]) > 2) {
                $month = $dates[1];
                $years = $dates[0];
            } else {
                $month = $dates[0];
                $years = $dates[1];
            }

            $date = date('m-Y', strtotime($years . '-' . $month));
            $date_query = date('Y-m', strtotime($years . '-' . $month));
        }

        ($unit->id == null) ? $unit->id = 1 : '';
        $question_category = Questions_category::get();
        $data = [];
        $data_respondent = [];
        $data_unit = $unit::where('id', $unit->id)->first();

        foreach ($question_category as $key => $value) {
            $reports = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                ->join('questions', 'questions.id', 'reports.question_id')
                ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                ->join('units', 'units.id', 'respondents.unit_id')
                ->latest('questions.questions_categorie_id')
                ->wherenull('reports.deleted_at')
                ->where('units.id', $unit->id)
                ->where('questions.questions_categorie_id', $value->id)
                ->where('reports.created_at', 'like', '%' . $date_query . '%');


            array_push($data_respondent, [
                'total_data'                => $reports->count(),
                'total_answer'              => $reports->sum('reports.result'),
                'rata_rata'                 => round($reports->avg('reports.result'), 2),
                'nilai_penimbang'           => (float) 0.111,
                'skm'                       => round((round($reports->avg('reports.result'), 2) * (float) 0.111), 2),
                'questions_categorie_id'     => $value->id,
                'questions_categorie'       => [
                    'name'          => $value->name,
                    'deleted_at'    =>  $value->deleted_at,
                    'created_at'    =>  $value->created_at,
                    'updated_at'    =>  $value->updated_at,
                ],
            ]);
        }

        $total_mean = 0;
        $count_mean = 0;
        $list_cart_name = [];
        $list_cart_value = [];
        foreach ($data_respondent as $key => $value) {
            $total_mean += $value['rata_rata'];
            $count_mean++;
            array_push($list_cart_name, $value['questions_categorie']['name']);
            array_push($list_cart_value, $value['skm']);
        }

        $total = $total_mean;
        $data['units'] = $data_unit;
        $data['respondents'] = $data_respondent;
        $data['list_cart_name'] = $list_cart_name;
        $data['list_cart_value'] = $list_cart_value;
        $data['rata_rata_skm'] = round(($total_mean / $count_mean), 2);
        $data['nilai'] = round($total_mean, 2);
        $data['selected_date'] = $date;
        $cache_name = 'reportCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('5 minutes')));

        if (count($request->input()) == 0) {
            $data = $data;
        }

        return $api->responseSuccess('Quesioner Report ' . $date, $data);
    }

    // public function show(Api $api, Report $report)
    // {
    //     $reports = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
    //         ->join('questions', 'questions.id', 'reports.question_id')
    //         ->join('units', 'units.id', 'respondents.unit_id')
    //         ->latest('reports.created_at')
    //         ->select(
    //             'reports.*',
    //             'respondents.unit_id as respondents_unit_id',
    //             'respondents.gender as respondents_gender',
    //             'respondents.education as respondents_education',
    //             'units.name as units_name',
    //             'questions.name as questions_name',
    //             'questions.questions_categorie_id as question_category'
    //         )
    //         ->where('reports.id', $report->id);
    //     $check_reports = $reports->count();

    //     if ($check_reports == 0) {
    //         return $api->responseError('Data not found');
    //     }

    //     $data = $reports->first();
    // $cache_name = 'reportCache';
    // $cache = cache($cache_name);
    // Cache::put($cache_name, $data, now()->addMinutes(strtotime('5 minutes')));
    //     return $api->responseSuccess('Quesioner Report', $data);
    // }

    public function store(Request $request, Api $api, RespondentController $respondentController)
    {
        $validate_respondents = $respondentController->validation(false, $request);
        // $validate_reports = $this->validation(false, $request);
        if ($validate_respondents->fails()) {
            return $api->errorValidation($validate_respondents);
        }
        // if ($validate_reports->fails()) {
        //     return $api->errorValidation($validate_reports);
        // }

        $respondent_id = DB::table('respondents')->orderBy('id', 'desc')->first();
        $respondent_id = $respondent_id->id + 1;
        $answers = $request->input('answers');

        $data_respondent = [
            'id'            => $respondent_id,
            'unit_id'       => $request->input('unit_id'),
            'gender'        => $request->input('gender'),
            'education'     => $request->input('education'),
        ];

        $result_respondent = Respondent::create($data_respondent);
        foreach ($answers as $key => $value) {
            $data_report = [
                'respondent_id'             => $respondent_id,
                'question_id'               => $value['question_id'],
                'result'                    => $value['answer'],
            ];
            $result_report = Report::create($data_report);
        }


        if ($result_report == true) {
            return $api->responseSuccess('Success', null);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    // public function store_old(Request $request, Api $api)
    // {
    //     $validate = $this->validation(false, $request);
    //     if ($validate->fails()) {
    //         return $api->errorValidation($validate);
    //     }

    //     $data = [
    //         'respondent_id'             => $request->input('respondent_id'),
    //         'question_id'               => $request->input('question_id'),
    //         'result'                    => $request->input('result'),
    //     ];

    //     $result = Report::create($data);
    //     if ($result == true) {
    //         return $api->responseSuccess('Success', $data);
    //     } else {
    //         return $api->responseError('Failed', $request);
    //     };
    // }

    // public function update(Request $request, Api $api, Report $report)
    // {
    //     $validate = $this->validation('update', $request);
    //     if ($validate->fails()) {
    //         return $api->errorValidation($validate);
    //     }

    //     $data = [
    //         'respondent_id'             => $request->input('respondent_id'),
    //         'question_id'               => $request->input('question_id'),
    //         'result'                    => $request->input('result'),
    //     ];

    //     $result = Report::where('id', $report->id)->update($data);
    //     if ($result == true) {
    //         return $api->responseSuccess('Success', $data);
    //     } else {
    //         return $api->responseError('Failed', $request);
    //     };
    // }

    // public function destroy(Api $api, Report $report)
    // {
    //     $result = $report::destroy($report->id);

    //     if ($result == true) {
    //         return $api->responseSuccess('Success');
    //     } else {
    //         return $api->responseError('Failed or Data not found');
    //     }
    // }

    // public function validation($type = false, $request)
    // {
    //     switch ($type) {
    //         case 'login':
    //             break;

    //         case 'update':
    //             $validation = validator($request->all(), [
    //                 'respondent_id'             => ['required', 'numeric', 'exists:respondents,id'],
    //                 'question_id'               => ['required', 'numeric', 'exists:questions,id'],
    //                 'result'                    => ['required', 'numeric', 'min:1'],
    //             ]);
    //             break;

    //         case 'update-img':
    //             break;

    //         default:
    //             $validation = validator($request->all(), [
    //                 // 'respondent_id'             => ['required', 'numeric', 'exists:respondents,id'],
    //                 'question_id'               => ['required', 'numeric', 'exists:questions,id'],
    //                 'result'                    => ['required', 'numeric', 'min:1'],
    //             ]);
    //             break;
    //     }

    //     return $validation;
    // }
}
