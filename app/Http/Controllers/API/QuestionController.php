<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionController as ControllersQuestionController;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuestionController extends Controller
{
    public function index(Request $request, Api $api)
    {
        $questions = Question::join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
            ->orderBy('questions.name', 'asc')
            ->select('questions.*', 'questions_categories.name as questions_categorie_name');

        if ($request->input('search')) {
            $questions
                ->where('questions.name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('questions_categories.name', 'like', '%' . $request->input('search') . '%');
        }

        if (count($request->input()) == 0) {
            $data = $questions->get();
        } else {
            $data = $questions->paginate(1);
        }


        $cache_name = 'questionCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Question', $data);
    }

    public function show(Api $api, Question $question)
    {
        $questions = $question::join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
            ->latest('questions.created_at')
            ->select('questions.*', 'questions_categories.name as questions_categorie_name')
            ->where('questions.id', $question->id);
        $check_question = $questions->count();

        if ($check_question == 0) {
            return $api->responseError('Data not found');
        }

        $data = $questions->first();
        $cache_name = 'questionCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Question', $data);
    }

    public function store(Request $request, Api $api)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'questions_categorie_id'    => $request->input('questions_categorie_id'),
            'name'                      => $request->input('name'),
        ];

        $result = Question::create($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function update(Request $request, Api $api, Question $question)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'questions_categorie_id' => $request->input('questions_categorie_id'),
            'name'                  => $request->input('name'),
        ];

        $result = Question::where('id', $question->id)->update($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function destroy(Api $api, Question $question)
    {
        $result = $question::destroy($question->id);

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
                    'questions_categorie_id'  => ['required', 'string', 'exists:questions_categories,id'],
                    'name'                  => ['required', 'string', 'min:5'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'questions_categorie_id'  => ['required', 'string', 'exists:questions_categories,id'],
                    'name'                  => ['required', 'string', 'min:5'],
                ]);
                break;
        }

        return $validation;
    }
}
