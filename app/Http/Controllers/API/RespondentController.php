<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Respondent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RespondentController extends Controller
{
    public function index(Request $request, Api $api)
    {
        $respondents = Respondent::join('units', 'units.id', 'respondents.unit_id')
            ->latest('respondents.created_at')
            ->select(
                'respondents.*',
                'units.name as units_name',
            );

        if ($request->input('search')) {
            $respondents
                ->where('units.name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('respondents.gender', 'like', '%' . $request->input('search') . '%')
                ->orwhere('respondents.education', 'like', '%' . $request->input('search') . '%');
        }

        if (count($request->input()) == 0) {
            $data = $respondents->get();
        } else {
            $data = $respondents->paginate(8);
        }

        $cache_name = 'respondentCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Respondent', $data);
    }

    public function show(Api $api, Respondent $respondent)
    {
        $respondents = Respondent::join('units', 'units.id', 'respondents.unit_id')
            ->latest('respondents.created_at')
            ->select(
                'respondents.*',
                'units.name as units_name',
            )
            ->where('respondents.id', $respondent->id);
        $check_respondents = $respondents->count();

        if ($check_respondents == 0) {
            return $api->responseError('Data not found');
        }

        $data = $respondents->first();
        $cache_name = 'respondentCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Respondent', $data);
    }

    public function store(Request $request, Api $api)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'unit_id'               => $request->input('unit_id'),
            'gender'                => $request->input('gender'),
            'education'             => $request->input('education'),
        ];

        $result = Respondent::create($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function update(Request $request, Api $api, Respondent $respondent)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'unit_id'               => $request->input('unit_id'),
            'gender'                => $request->input('gender'),
            'education'             => $request->input('education'),
        ];

        $result = Respondent::where('id', $respondent->id)->update($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function destroy(Api $api, Respondent $respondent)
    {
        $result = $respondent::destroy($respondent->id);

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
                    'unit_id'               => ['required', 'exists:units,id'],
                    'gender'                => ['required', 'alpha', 'min:1', 'max:1'],
                    'education'             => ['required', 'string', 'min:1'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'unit_id'               => ['required', 'exists:units,id'],
                    'gender'                => ['required', 'alpha', 'min:1', 'max:1'],
                    'education'             => ['required', 'string', 'min:1'],
                ]);
                break;
        }

        return $validation;
    }
}
