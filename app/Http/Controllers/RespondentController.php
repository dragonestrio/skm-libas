<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRespondentRequest;
use App\Http\Requests\UpdateRespondentRequest;
use App\Models\Respondent;
use App\Models\Unit;
use Illuminate\Http\Request;

class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $data = [
            'title'                     => 'Responden',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'responden',
            'respondent'                => $respondents->simplePaginate(8),
        ];

        return view('respondent.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Api $api)
    {
        $data = [
            'title'                 => 'Tambah Responden',
            'app'                   => 'SKM LIBAS',
            'author'                => '',
            'description'           => '',
            'state'                 => 'create',
            'position'              => 'responden',
            'unit'                  => Unit::get(),
        ];

        return view('respondent.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRespondentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Api $api)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('respondents/create')->withErrors($validate)->withInput();
        }

        $data = [
            'unit_id'               => $request->input('unit_id'),
            'gender'                => $request->input('gender'),
            'education'             => $request->input('education'),
        ];

        $result = Respondent::create($data);
        if ($result == true) {
            return redirect('respondents')->with('notif-y', 'sukses');
        } else {
            return redirect('respondents/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function show(Respondent $respondent)
    {
        // EMPTY
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function edit(Respondent $respondent, Api $api, Request $request)
    {
        $respondents = $respondent::where('id', $respondent->id);
        $check_respondents = $respondents->count();

        $data = [
            'title'                     => 'Perbarui Responden',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'responden',
            'unit'                      => Unit::get(),
            'respondent_count'          => $check_respondents,
            'respondent'                => $respondents->first(),
        ];

        return view('respondent.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRespondentRequest  $request
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Api $api, Respondent $respondent)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return redirect('respondents/' . $respondent->id . '/edit')->withErrors($validate)->withInput();
        }

        $data = [
            'unit_id'               => $request->input('unit_id'),
            'gender'                => $request->input('gender'),
            'education'             => $request->input('education'),
        ];

        $result = Respondent::where('id', $respondent->id)->update($data);
        if ($result == true) {
            return redirect('respondents')->with('notif-y', 'sukses');
        } else {
            return redirect('respondents/' . $respondent->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Api $api, Respondent $respondent)
    {
        $result = $respondent::destroy($respondent->id);

        if ($result == true) {
            return redirect('respondents')->with('notif-y', 'sukses');
        } else {
            return redirect('respondents')->with('notif-x', 'error');
        }
    }

    public function validation($type = false, $request)
    {
        switch ($type) {
            case 'login':
                break;

            case 'update':
                $validation = validator($request->all(), [
                    'unit_id'               => ['required', 'string', 'exists:units,id'],
                    'gender'                => ['required', 'alpha', 'min:1', 'max:1'],
                    'education'             => ['required', 'string', 'min:1'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'unit_id'               => ['required', 'string', 'exists:units,id'],
                    'gender'                => ['required', 'alpha', 'min:1', 'max:1'],
                    'education'             => ['required', 'string', 'min:1'],
                ]);
                break;
        }

        return $validation;
    }
}
