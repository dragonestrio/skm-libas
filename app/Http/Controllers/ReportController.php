<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
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
    public function index(Request $request, Api $api)
    {
        ($request->input('page') == null) ? $request->merge(['page' => 1]) : '';
        (count($request->input()) > 0)
            ? $reports = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'reports'), null)
            : $reports = $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'reports'), null);

        $data = [
            'title'                     => 'Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'laporan kuesioner',
            'report'                    => $reports->data,
        ];

        return view('report.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Api $api)
    {
        $data = [
            'title'             => 'Tambah Laporan Kuesioner',
            'app'               => 'SKM LIBAS',
            'author'            => '',
            'description'       => '',
            'state'             => 'create',
            'position'          => 'laporan kuesioner',
            'users'             => Users::latest()->get(),
            'question'          => $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions'), null)->data,
        ];

        return view('report.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Api $api)
    {
        $reports = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'reports'), null);
        if (isset($reports->error) && $reports->error == 'Failed to Validate') {
            return redirect('reports/create')->withErrors($reports->data)->withInput();
        }

        $result = $reports->success;
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
        // EMPTY
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report, Api $api, Request $request)
    {
        $reports = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'reports'), $report->id);
        $check_reports = count((array) $reports->data);

        $data = [
            'title'                     => 'Perbarui Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'laporan kuesioner',
            'users'                     => Users::latest()->get(),
            'question'                  => $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions'), null)->data,
            'report_count'              => $check_reports,
            'report'                    => $reports->data,
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
    public function update(Request $request, Report $report, Api $api)
    {
        $reports = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'reports'), $report->id);
        if (isset($reports->error) && $reports->error == 'Failed to Validate') {
            return redirect('reports/' . $report->id . '/edit')->withErrors($reports->data)->withInput();
        }

        $result = $reports->success;
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
    public function destroy(Report $report, Api $api, Request $request)
    {
        $reports = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'reports'), $report->id);

        $result = $reports->success;
        if ($result == true) {
            return redirect('reports')->with('notif-y', 'sukses');
        } else {
            return redirect('reports')->with('notif-x', 'error');
        }
    }
}
