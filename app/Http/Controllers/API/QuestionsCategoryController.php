<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Questions_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuestionsCategoryController extends Controller
{
    public function index(Request $request, Api $api)
    {
        $question_categories = Questions_category::orderBy('name');

        if ($request->input('search')) {
            $question_categories
                ->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if (count($request->input()) == 0) {
            $data = $question_categories->get();
        } else {
            $data = $question_categories->paginate(8);
        }

        return $api->responseSuccess('Question Category', $data);
    }

    public function show(Api $api, Questions_category $questions_category)
    {
        $question_categories = $questions_category::where('id', $questions_category->id);
        $check_question_categories = $question_categories->count();

        if ($check_question_categories == 0) {
            return $api->responseError('Data not found');
        }

        $data = $question_categories->first();
        return $api->responseSuccess('Question Category', $data);
    }

    public function store(Request $request, Api $api)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Questions_category::create($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function update(Request $request, Api $api, Questions_category $questions_category)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Questions_category::where('id', $questions_category->id)->update($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function destroy(Api $api, Questions_category $questions_category)
    {
        $result = $questions_category::destroy($questions_category->id);

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
                    'name'                  => ['required', 'string', 'min:5', 'max:50'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'name'                  => ['required', 'string', 'min:5', 'max:50', 'unique:questions_categories,name'],
                ]);
                break;
        }

        return $validation;
    }
}
