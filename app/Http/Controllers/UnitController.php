<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Api $api)
    {
        ($request->input('page') == null) ? $request->merge(['page' => 1]) : '';
        (count($request->input()) > 0)
            ? $units = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'units'), null)
            : $units = $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'units'), null);

        $data = [
            'title'         => 'Unit Fokus',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'unit fokus',
            'units'         => $units->data,
        ];

        return view('units.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Api $api)
    {
        $data = [
            'title'         => 'Tambah Unit Fokus',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'create',
            'position'      => 'unit fokus',
        ];

        return view('units.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Api $api)
    {
        $units = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'units'), null);
        if (isset($units->error) && $units->error == 'Failed to Validate') {
            return redirect('units/create')->withErrors($units->data)->withInput();
        }

        $result = $units->success;
        if ($result == true) {
            return redirect('units')->with('notif-y', 'sukses');
        } else {
            return redirect('units/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        // EMPTY
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit, Api $api, Request $request)
    {
        $units = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'units'), $unit->id);
        $check_units = count((array) $units->data);

        $data = [
            'title'         => 'Perbarui Unit Fokus',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'unit fokus',
            'units_count'   => $check_units,
            'units'         => $units->data,
        ];

        return view('units.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit, Api $api)
    {
        $units = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'units'), $unit->id);
        if (isset($units->error) && $units->error == 'Failed to Validate') {
            return redirect('units/' . $unit->id . '/edit')->withErrors($units->data)->withInput();
        }

        $result = $units->success;
        if ($result == true) {
            return redirect('units')->with('notif-y', 'sukses');
        } else {
            return redirect('units/' . $unit->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, Api $api, Request $request)
    {
        $questions = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'units'), $unit->id);

        $result = $questions->success;
        if ($result == true) {
            return redirect('units')->with('notif-y', 'sukses');
        } else {
            return redirect('units')->with('notif-x', 'error');
        }
    }
}
