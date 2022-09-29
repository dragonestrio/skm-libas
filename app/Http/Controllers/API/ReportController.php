<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReportController extends Controller
{
    public function index(Request $request, Api $api)
    {
        $reports = Report::join('users', 'users.id', 'reports.user_id')
            ->join('questions', 'questions.id', 'reports.question_id')
            ->latest('reports.created_at')
            ->select(
                'reports.*',
                'users.email as users_email',
                'users.name as users_name',
                'questions.name as questions_name',
                'questions.questions_categorie_id as question_category'
            );

        if ($request->input('search')) {
            $reports
                ->where('users.email', 'like', '%' . $request->input('search') . '%')
                ->orwhere('questions.name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('reports.result', 'like', '%' . $request->input('search') . '%');
        }

        if (count($request->input()) == 0) {
            $data = $reports->get();
        } else {
            $data = $reports->paginate(8);
        }

        return $api->responseSuccess('Quesioner Report', $data);
    }

    public function show(Api $api, Report $report)
    {
        $reports = Report::join('users', 'users.id', 'reports.user_id')
            ->join('questions', 'questions.id', 'reports.question_id')
            ->latest('reports.created_at')
            ->select(
                'reports.*',
                'users.email as users_email',
                'users.name as users_name',
                'questions.name as questions_name',
                'questions.questions_categorie_id as questions_category'
            )
            ->where('reports.id', $report->id);
        $check_reports = $reports->count();

        if ($check_reports == 0) {
            return $api->responseError('Data not found');
        }

        $data = $reports->first();
        return $api->responseSuccess('Quesioner Report', $data);
    }

    public function store(Request $request, Api $api)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'user_id'                   => $request->input('user_id'),
            'question_id'               => $request->input('question_id'),
            'result'                    => $request->input('result'),
        ];

        $result = Report::create($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function update(Request $request, Api $api, Report $report)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'user_id'                   => $request->input('user_id'),
            'question_id'               => $request->input('question_id'),
            'result'                    => $request->input('result'),
        ];

        $result = Report::where('id', $report->id)->update($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function destroy(Api $api, Report $report)
    {
        $result = $report::destroy($report->id);

        if ($result == true) {
            return $api->responseSuccess('Success');
        } else {
            return $api->responseError('Failed or Data not found');
        }
    }

    public function validation($type = false, $request)
    {
        switch ($type) {
            case 'login':
                break;

            case 'update':
                $validation = validator($request->all(), [
                    'user_id'                   => ['required', 'string', 'exists:users,id'],
                    'question_id'               => ['required', 'string', 'exists:questions,id'],
                    'result'                    => ['required', 'numeric', 'min:1'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'user_id'                   => ['required', 'string', 'exists:users,id'],
                    'question_id'               => ['required', 'string', 'exists:questions,id'],
                    'result'                    => ['required', 'numeric', 'min:1'],
                ]);
                break;
        }

        return $validation;
    }
}
