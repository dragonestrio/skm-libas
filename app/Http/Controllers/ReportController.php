<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Question;
use App\Models\Questions_category;
use App\Models\Report;
use App\Models\Users;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $report = Report::with('users', 'question_category');
        $report = Report::join('users', 'users.id', 'reports.user_id')
            ->join('questions', 'questions.id', 'reports.question_id')
            ->latest('reports.created_at')
            ->select(
                'reports.*',
                'users.email as users_email',
                'users.name as users_name',
                'questions.name as question_name',
                'questions.questions_categorie_id as question_category'
            );

        if ($request->input('search')) {
            $report
                ->where('user_email', 'like', '%' . $request->input('search') . '%')
                ->orwhere('question_name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('reports.result', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'                     => 'Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'laporan kuesioner',
            'report'                    => $report->simplePaginate(8),
        ];

        return view('report.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'             => 'Tambah Laporan Kuesioner',
            'app'               => 'SKM LIBAS',
            'author'            => '',
            'description'       => '',
            'state'             => 'create',
            'position'          => 'laporan kuesioner',
            'users'             => Users::latest()->get(),
            'question'          => Question::latest()->get(),
        ];

        return view('report.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('reports/create')->withErrors($validate)->withInput();
        }

        $data = [
            'user_id'                   => $request->input('user_id'),
            'question_id'               => $request->input('question_id'),
            'result'                    => $request->input('result'),
        ];

        $result = Report::create($data);
        if ($result == true) {
            return redirect('reports')->with('notif-y', 'sukses');
        } else {
            return redirect('reports/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $check_report = $report::where('id', $report->id)->count();
        $reporta = $report::where('id', $report->id)->first();

        $data = [
            'title'                     => 'Perbarui Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'laporan kuesioner',
            'users'                     => Users::latest()->get(),
            'question'                  => Question::latest()->get(),
            'report_count'              => $check_report,
            'report'                    => $reporta,
        ];

        return view('report.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return redirect('reports/' . $report->id . '/edit')->withErrors($validate)->withInput();
        }

        $data = [
            'user_id'                   => $request->input('user_id'),
            'question_id'               => $request->input('question_id'),
            'result'                    => $request->input('result'),
        ];

        $result = Report::where('id', $report->id)->update($data);
        if ($result == true) {
            return redirect('reports')->with('notif-y', 'sukses');
        } else {
            return redirect('reports/' . $report->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $result = $report::destroy($report->id);

        if ($result == true) {
            return redirect('reports')->with('notif-y', 'sukses');
        } else {
            return redirect('reports')->with('notif-x', 'error');
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
