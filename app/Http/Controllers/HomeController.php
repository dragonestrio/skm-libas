<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Models\Mhs;
use App\Models\Report;
use App\Models\Respondent;
use App\Models\Unit;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Home',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'home',
        ];
        return view('home-index', $data);
    }

    public function register_index(Request $request)
    {
        $data = [
            'title'         => 'Register',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'register',
        ];

        return view('register', $data);
    }

    public function login_index(Request $request)
    {
        $cookie = new Cookie;
        $ck_name = 'satrio_n_w_remember-me';
        $cookie_check = $cookie->check($ck_name);
        ($cookie_check == false) ?: $recent_email = $cookie->show($ck_name);

        $data = [
            'title'         => 'Login',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'login',
            'recent_email'  => ($recent_email) ?? ''
        ];

        return view('login', $data);
    }

    public function dashboard(Request $request)
    {
        $level = auth()->user()->level;
        switch ($level) {
            case 'superadmin':
            case 'admin':
                return $this->dashboard_admin();
                break;

            default:
                return redirect('/')->with('notif-x', 'Error');
                // return $this->dashboard_user($request);
                break;
        }
    }

    // public function dashboard_user(Request $request)
    // {
    //     $mhs = Mhs::latest();

    //     if ($request->input('search')) {
    //         $mhs
    //             ->where('nim', 'like', '%' . $request->input('search') . '%')
    //             ->orwhere('nama', 'like', '%' . $request->input('search') . '%');
    //     }

    //     $data = [
    //         'title'         => 'Dashboard',
    //         'app'           => 'SKM LIBAS',
    //         'author'        => '',
    //         'description'   => '',
    //         'state'         => 'read',
    //         'position'      => 'dashboard',
    //         'mhs'           => $mhs->simplePaginate(8),
    //     ];

    //     return view('dashboard.user', $data);
    // }

    public function dashboard_admin()
    {
        $before = 8;
        $time_now = date('Y-m-d H', time());
        $time_before = date('Y-m-d H', strtotime('-1 hours'));
        $time_before_set = [];
        $time_before_set_label = [];
        for ($aa = 0; $aa < $before; $aa++) {
            array_push($time_before_set, date('Y-m-d H', strtotime('-' . $aa . 'hours')));
            array_push($time_before_set_label, date('H', strtotime('-' . $aa . 'hours')));
        }
        $day_now = date('Y-m-d', time());
        $day_before = date('Y-m-d', strtotime('-1 days'));
        $day_before_set = [];
        $day_before_set_label = [];
        for ($ab = 0; $ab < $before; $ab++) {
            array_push($day_before_set, date('Y-m-d', strtotime('-' . $ab . 'days')));
            array_push($day_before_set_label, date('D', strtotime('-' . $ab . 'days')));
        }
        $month_now = date('Y-m', time());
        $month_before = date('Y-m', strtotime('-1 months'));
        $month_before_set = [];
        $month_before_set_label = [];
        for ($ac = 0; $ac < $before; $ac++) {
            array_push($month_before_set, date('Y-m', strtotime('-' . $ac . 'months')));
            array_push($month_before_set_label, date('M', strtotime('-' . $ac . 'months')));
        }
        $years_now = date('Y', time());
        $years_before = date('Y', strtotime('-1 years'));
        $years_before_set = [];
        $years_before_set_label = [];
        for ($ad = 0; $ad < $before; $ad++) {
            array_push($years_before_set, date('Y', strtotime('-' . $ad . 'years')));
            array_push($years_before_set_label, date('Y', strtotime('-' . $ad . 'years')));
        }
        $data_report = [];
        $graphic_report = [
            'gender'    => [
                'label'     => [],
                'data'      => [
                    'pria'      => [],
                    'wanita'    => [],
                ],
                'color'     => [
                    'pria'      => 'blue',
                    'wanita'    => 'red',
                ]
            ],
            'education' => [
                'label'     => [],
                'data'      => [],
                'color'     => [],
            ],
        ];

        $color = ['red', 'blue', 'green', 'orange', 'purple', 'magenta'];

        if (request()->input('unit') != null && request()->input('date') != null) {
            switch (request()->input('date')) {
                case 'time':
                    $filter = $time_now;
                    $filter_before = $time_before;
                    $filter_before_set = $time_before_set;
                    $graphic_report['gender']['label'] = $time_before_set_label;
                    break;
                case 'day':
                    $filter = $day_now;
                    $filter_before = $day_before;
                    $filter_before_set = $day_before_set;
                    $graphic_report['gender']['label'] = $day_before_set_label;
                    break;
                case 'month':
                    $filter = $month_now;
                    $filter_before = $month_before;
                    $filter_before_set = $month_before_set;
                    $graphic_report['gender']['label'] = $month_before_set_label;
                    break;
                case 'year':
                    $filter = $years_now;
                    $filter_before = $years_before;
                    $filter_before_set = $years_before_set;
                    $graphic_report['gender']['label'] = $years_before_set_label;
                    break;
                default:
                    $filter = '';
                    $filter_before = '';
                    $filter_before_set = '';
                    break;
            }

            for ($ia = 0; $ia < 3; $ia++) {
                $reports = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                    ->join('questions', 'questions.id', 'reports.question_id')
                    ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                    ->join('units', 'units.id', 'respondents.unit_id')
                    ->latest('questions.questions_categorie_id')
                    ->where('units.id', request()->input('unit'))
                    ->where('reports.created_at', 'like', '%' . $filter . '%');

                $reports_before = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                    ->join('questions', 'questions.id', 'reports.question_id')
                    ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                    ->join('units', 'units.id', 'respondents.unit_id')
                    ->latest('questions.questions_categorie_id')
                    ->where('units.id', request()->input('unit'))
                    ->where('reports.created_at', 'like', '%' . $filter_before . '%');

                switch ($ia) {
                    case 0:
                        $report_pria = $reports->where('respondents.gender', 'L')->count();
                        $report_pria_before = $reports_before->where('respondents.gender', 'L')->count();
                        break;
                    case 1:
                        $report_wanita = $reports->where('respondents.gender', 'P')->count();
                        $report_wanita_before = $reports_before->where('respondents.gender', 'P')->count();
                        break;
                    case 2:
                        $report_total = $reports->count();
                        $report_total_before = $reports_before->count();
                        break;

                    default:
                        # code...
                        break;
                }
            }

            for ($ib = 0; $ib < $before; $ib++) {
                for ($ic = 0; $ic < 2; $ic++) {
                    $reports_graphic = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                        ->join('questions', 'questions.id', 'reports.question_id')
                        ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                        ->join('units', 'units.id', 'respondents.unit_id')
                        ->latest('questions.questions_categorie_id')
                        ->where('units.id', request()->input('unit'));

                    switch ($ic) {
                        case 0:
                            array_push($graphic_report['gender']['data']['pria'], $reports_graphic
                                ->where('respondents.gender', 'L')->where('reports.created_at', 'like', '%' . $filter_before_set[$ib] . '%')->count());
                            break;
                        case 1:
                            array_push($graphic_report['gender']['data']['wanita'], $reports_graphic
                                ->where('respondents.gender', 'P')->where('reports.created_at', 'like', '%' . $filter_before_set[$ib] . '%')->count());
                            break;

                        default:
                            # code...
                            break;
                    }
                }
            }


            $education = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                ->join('questions', 'questions.id', 'reports.question_id')
                ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                ->join('units', 'units.id', 'respondents.unit_id')
                ->where('units.id', request()->input('unit'))
                ->where('reports.created_at', 'like', '%' . $filter . '%')
                ->select('respondents.education')->groupBy('respondents.education')->get();

            foreach ($education as $key => $value) {
                $education_report = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                    ->join('questions', 'questions.id', 'reports.question_id')
                    ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                    ->join('units', 'units.id', 'respondents.unit_id')
                    ->where('units.id', request()->input('unit'))
                    ->where('reports.created_at', 'like', '%' . $filter . '%');

                array_push($graphic_report['education']['label'], $value->education);
                array_push($graphic_report['education']['data'], $education_report->where('respondents.education', $value->education)->count());
                $color_picker = array_rand($color);
                array_push($graphic_report['education']['color'], $color[$color_picker]);
            }
        } else {
            for ($ib = 0; $ib < 6; $ib++) {
                $reports = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                    ->join('questions', 'questions.id', 'reports.question_id')
                    ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                    ->join('units', 'units.id', 'respondents.unit_id')
                    ->latest('questions.questions_categorie_id');

                switch ($ib) {
                    case 0:
                        $report_pria = $reports->where('respondents.gender', 'L')->count();
                        break;
                    case 1:
                        $report_wanita = $reports->where('respondents.gender', 'P')->count();
                        break;
                    case 2:
                        $report_total = $reports->count();
                        break;
                    case 3:
                        array_push($graphic_report['gender']['data']['pria'], $reports
                            ->where('respondents.gender', 'L')->count());
                        array_push($graphic_report['gender']['data']['pria'], 0);
                        break;
                    case 4:
                        array_push($graphic_report['gender']['data']['wanita'], $reports
                            ->where('respondents.gender', 'P')->count());
                        array_push($graphic_report['gender']['data']['wanita'], 0);
                        break;
                    case 5:
                        array_push($graphic_report['gender']['label'], 'now');
                        array_push($graphic_report['gender']['label'], 'old');
                        break;

                    default:
                        # code...
                        break;
                }
            }


            $education = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                ->join('questions', 'questions.id', 'reports.question_id')
                ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                ->join('units', 'units.id', 'respondents.unit_id')
                ->select('respondents.education')->groupBy('respondents.education')->get();

            foreach ($education as $key => $value) {
                $education_report = Report::join('respondents', 'respondents.id', 'reports.respondent_id')
                    ->join('questions', 'questions.id', 'reports.question_id')
                    ->join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
                    ->join('units', 'units.id', 'respondents.unit_id');

                array_push($graphic_report['education']['label'], $value->education);
                array_push($graphic_report['education']['data'], $education_report->where('respondents.education', $value->education)->count());
                $color_picker = array_rand($color);
                array_push($graphic_report['education']['color'], $color[$color_picker]);
            }
        }

        $data_report['pria'] = [
            'label'         => 'responden pria',
            'color'         => 'bg-gradient-info',
            'icon'          => '<path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>',
            'total'         => $report_pria,
            'before'        => (request()->input('unit') != null && request()->input('date') != null) ? $report_pria_before : $report_pria,
            'different'     => (request()->input('unit') != null && request()->input('date') != null) ? $report_pria - $report_pria_before : 0,
        ];
        $data_report['wanita'] = [
            'label'         => 'responden wanita',
            'color'         => 'bg-gradient-warning',
            'icon'          => '<path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>',
            'total'         => $report_wanita,
            'before'        => (request()->input('unit') != null && request()->input('date') != null) ? $report_wanita_before : $report_wanita,
            'different'     => (request()->input('unit') != null && request()->input('date') != null) ? $report_wanita - $report_wanita_before : 0,
        ];
        $data_report['total'] = [
            'label'         => 'seluruh responden',
            'color'         => 'bg-gradient-success',
            'icon'          => '<path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>',
            'total'         => $report_total,
            'before'        => (request()->input('unit') != null && request()->input('date') != null) ? $report_total_before : $report_total,
            'different'     => (request()->input('unit') != null && request()->input('date') != null) ? $report_total - $report_total_before : 0,
        ];

        // dd($graphic_report);
        $data = [
            'title'         => 'Dashboard',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'dashboard',
            'unit'          => Unit::get(),
            'report'        => json_decode(json_encode($data_report)),
            'report_graphics' => json_decode(json_encode($graphic_report)),
        ];

        return view('dashboard.admin', $data);
    }
}
