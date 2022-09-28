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
    public function index(Request $request)
    {
        $unit = Unit::orderBy('name');

        if ($request->input('search')) {
            $unit
                ->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'         => 'Unit Fokus',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'unit fokus',
            'units'         => $unit->simplePaginate(8),
        ];

        return view('units.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function store(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('units/create')->withErrors($validate)->withInput();
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Unit::create($data);
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
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $check_units = $unit::where('id', $unit->id)->count();
        $data = [
            'title'         => 'Perbarui Unit Fokus',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'unit fokus',
            'units_count'   => $check_units,
            'units'         => $unit::where('id', $unit->id)->first(),
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
    public function update(Request $request, Unit $unit)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return redirect('units/' . $unit->id . '/edit')->withErrors($validate)->withInput();
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Unit::where('id', $unit->id)->update($data);
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
    public function destroy(Unit $unit)
    {
        $result = $unit::destroy($unit->id);

        if ($result == true) {
            return redirect('units')->with('notif-y', 'sukses');
        } else {
            return redirect('units')->with('notif-x', 'error');
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
                    'name'                  => ['required', 'string', 'max:50', 'unique:units,name'],
                ]);
                break;
        }

        return $validation;
    }
}
