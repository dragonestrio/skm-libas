<?php

namespace App\Http\Controllers\API;

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
    public function index(Request $request)
    {

        $unit = cache('unitCache');


        $data = [];
        if (!$unit) {
            $data = Unit::orderBy("name", "ASC")->get();


            Cache::put('unitCache', $data, now()->addMinutes(60));
        } else {
            $data = $unit;
        }

        return $this->success("Daftar Unit", $data, 200);
    }
}
