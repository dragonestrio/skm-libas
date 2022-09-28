<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Models\Mhs;
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
        $data = [
            'title'         => 'Dashboard',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'dashboard',
        ];

        return view('dashboard.admin', $data);
    }
}
