<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Questions_category;
use App\Models\Report;
use App\Models\Unit;
use App\Models\Users;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Api $api, Questions_category $questions_category, $date = null)
    {
        if ($request->input('unit') != null & $request->input('date') != null) {
            return redirect('reports/' . $request->input('unit') . '/' . $request->input('date'));
        }

        if ($questions_category->id == null) {
            $reports = $api->sendGet($request->input(), url('api/' . 'respondent' . '/1/' . date('m-Y', time())), null);
        } else {
            if ($date != null) {
                $reports = $api->sendGet($request->input(), url('api/' . 'respondent/' . $questions_category->id . '/' . $date), null);
            } else {
                $reports = $api->sendGet($request->input(), url('api/' . 'respondent/' . $questions_category->id . '/' . date('m-Y', time())), null);
            }
        }

        // dd($reports);
        $report_graphic = [];
        $report_graphic_label = [];
        $report_graphic_data = [];
        $report_graphic_bg_color = [];
        $bg_color_data = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ];

        foreach ($reports->data->respondents as $key => $value) {
            array_push($report_graphic_label, ucwords($value->questions_categorie->name));
            array_push($report_graphic_data, ucwords($value->rata_rata));
            $bg_color_pick = array_rand($bg_color_data);
            array_push($report_graphic_bg_color, $bg_color_data[$bg_color_pick]);
        }

        $report_graphic['label'] = $report_graphic_label;
        $report_graphic['data'] = $report_graphic_data;
        $report_graphic['bg_color'] = $report_graphic_bg_color;

        $reports_message = explode(' ', $reports->message);
        $reports_date = explode('-', $reports_message[2]);
        $reports_date = date('M Y', strtotime($reports_date[1] . '-' . $reports_date[0]));
        $reports_message = $reports_message[0] . ' ' . $reports_message[1] . ' ' . $reports_date;
        $reports->message = $reports_message;

        $data = [
            'title'                     => 'Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'laporan kuesioner',
            'unit'                      => Unit::get(),
            'report'                    => $reports->data,
            'report_graphic'            => $report_graphic,
            'unit_current'              => $questions_category->id,
            'date_current'              => $date,
        ];

        return view('report.report', $data);
    }
    // public function index_old(Request $request, Api $api)
    // {
    //     ($request->input('page') == null) ? $request->merge(['page' => 1]) : '';
    //     (count($request->input()) > 0)
    //         ? $reports = $api->sendGet($request->input(), url('api/' . 'reports'), null)
    //         : $reports = $api->sendGet(null, url('api/' . 'reports'), null);

    //     $data = [
    //         'title'                     => 'Laporan Kuesioner',
    //         'app'                       => 'SKM LIBAS',
    //         'author'                    => '',
    //         'description'               => '',
    //         'state'                     => 'read',
    //         'position'                  => 'laporan kuesioner',
    //         'report'                    => $reports->data,
    //     ];

    //     return view('report.index', $data);
    // }

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
            'respondent'        => $api->sendGet(null, url('api/' . 'respondents'), null)->data,
            'question'          => $api->sendGet(null, url('api/' . 'questions'), null)->data,
            'unit'              => $api->sendGet(null, url('api/' . 'units'), null)->data,
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
        $reports = $api->sendPost($request->input(), url('api/' . 'reports'), null);
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
        $reports = $api->sendGet($request->input(), url('api/' . 'reports'), $report->id);
        $check_reports = count((array) $reports->data);

        $data = [
            'title'                     => 'Perbarui Laporan Kuesioner',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'laporan kuesioner',
            'respondent'                => $api->sendGet(null, url('api/' . 'respondents'), null)->data,
            'question'                  => $api->sendGet(null, url('api/' . 'questions'), null)->data,
            'unit'                      => $api->sendGet(null, url('api/' . 'units'), null)->data,
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
        $reports = $api->sendPost($request->input(), url('api/' . 'reports'), $report->id);
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
        $reports = $api->sendPost($request->input(), url('api/' . 'reports'), $report->id);

        $result = $reports->success;
        if ($result == true) {
            return redirect('reports')->with('notif-y', 'sukses');
        } else {
            return redirect('reports')->with('notif-x', 'error');
        }
    }
}
