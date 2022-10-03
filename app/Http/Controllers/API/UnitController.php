<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Api $api)
    {
        $units = Unit::orderBy('name');

        if ($request->input('search')) {
            $units
                ->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if (count($request->input()) == 0) {
            $data = $units->get();
        } else {
            $data = $units->paginate(8);
        }

        $cache_name = 'unitCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Unit', $data);
    }

    public function show(Api $api, Unit $unit)
    {
        $units = $unit::where('id', $unit->id);

        $check_units = $units->count();

        if ($check_units == 0) {
            return $api->responseError('Data not found');
        }

        $data = $units->first();
        $cache_name = 'unitCache';
        $cache = cache($cache_name);
        Cache::put($cache_name, $data, now()->addMinutes(strtotime('1 minutes')));
        return $api->responseSuccess('Unit', $data);
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

        $result = Unit::create($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function update(Request $request, Api $api, Unit $unit)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return $api->errorValidation($validate);
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Unit::where('id', $unit->id)->update($data);
        if ($result == true) {
            return $api->responseSuccess('Success', $data);
        } else {
            return $api->responseError('Failed', $request);
        };
    }

    public function destroy(Api $api, Unit $unit)
    {
        $result = $unit::destroy($unit->id);

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
                    'name'                  => ['required', 'string', 'min:3', 'max:50'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'name'                  => ['required', 'string', 'min:3', 'max:50', 'unique:units,name'],
                ]);
                break;
        }

        return $validation;
    }
}
