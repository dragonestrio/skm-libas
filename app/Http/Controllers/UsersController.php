<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Dotenv\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\LoginHistory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule as ValidationRule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Users::latest();

        if ($request->input('search')) {
            $user
                ->where('name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('email', 'like', '%' . $request->input('search') . '%')
                ->orwhere('level', 'like', '%' . $request->input('search') . '%')
                ->orwhere('phone', 'like', '%' . $request->input('search') . '%')
                ->orwhere('gender', 'like', '%' . $request->input('search') . '%')
                ->orwhere('address', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'         => 'Admin',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'read',
            'position'      => 'admin',
            'users'         => $user->simplePaginate(8),
        ];

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'         => 'Tambah Admin',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'create',
            'position'      => 'admin',
        ];

        return view('users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('users/create')->withErrors($validate)->withInput();
        }

        $profile_pic = $request->file('profile_pic');
        if (filesize($profile_pic) == false) {
            $profile_pic = '';
        } else {
            $count_file = count($profile_pic['name']);
            if ($count_file > 1) {
                return redirect('users/create')->with('notif-x', 'you just can upload 1 files')->withInput();
            }
            $profile_pic_name = time() . '_' . $profile_pic->hashName();
            $profile_pic->move(public_path('media/upload/profile/'), $profile_pic_name);
            $profile_pic = $profile_pic_name;
        }

        $data = [
            'id'            => $this->id_generate(),
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
            'level'         => ($request->input('level') != null) ? $request->input('level') : 'user',
            'name'          => $request->input('name'),
            'phone'         => $request->input('phone'),
            'gender'        => $request->input('gender'),
            'address'       => $request->input('address'),
            'date_born'     => $request->input('date_born'),
            'profile_pic'   => $profile_pic,
        ];

        $result = Users::create($data);
        if ($result == true) {
            return redirect('users')->with('notif-y', 'sukses');
        } else {
            return redirect('users/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        $check_users = $user::where('id', $user->id)->count();
        $data = [
            'title'         => 'Perbarui Admin',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'admin',
            'users_count'   => $check_users,
            'users'         => $user::where('id', $user->id)->first(),
            'login_history' => $user::join('login_histories', 'login_histories.user_id', 'users.id')->where('login_histories.user_id', $user->id)->get(),
        ];

        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        $check_users = $user::where('id', $user->id)->count();
        $data = [
            'title'         => 'Perbarui Admin',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'admin',
            'users_count'   => $check_users,
            'users'         => $user::where('id', $user->id)->first(),
        ];

        return view('users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        (filesize($request->file('profile_pic')) == false) ? $validate = $this->validation('update', $request) : $validate = $this->validation('update-img', $request);
        if ($validate->fails()) {
            return redirect('users/' . $user->id . '/edit')->withErrors($validate)->withInput();
        }

        $profile_pic = $request->file('profile_pic');
        if (filesize($profile_pic) == false) {
            $profile_pic = $user->profile_pic;
        } else {
            $count_file = count($profile_pic['name']);
            if ($count_file > 1) {
                return redirect('users/' . $user->id . '/edit')->with('notif-x', 'you just can upload 1 files')->withInput();
            }
            $profile_pic_name = time() . '_' . $profile_pic->hashName();
            $profile_pic->move(public_path('media/upload/profile/'), $profile_pic_name);
            $profile_pic = $profile_pic_name;
            $unlink_old_pic = unlink(public_path('media/upload/profile/' . $user->profile_pic));
        }

        $data = [
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
            'level'         => ($request->input('level') != null) ? $request->input('level') : 'user',
            'name'          => $request->input('name'),
            'phone'         => $request->input('phone'),
            'gender'        => $request->input('gender'),
            'address'       => $request->input('address'),
            'date_born'     => $request->input('date_born'),
            'profile_pic'   => $profile_pic,
        ];

        $result = Users::where('id', $user->id)->update($data);
        if ($result == true) {
            return redirect('users')->with('notif-y', 'sukses');
        } else {
            return redirect('users/' . $user->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $result = $user::destroy($user->id);

        if ($result == true) {
            return redirect('users')->with('notif-y', 'sukses');
        } else {
            return redirect('users')->with('notif-x', 'error');
        }
    }

    public function profile_index()
    {
        $user = Users::where('id', auth()->user()->id);
        $data = [
            'title'         => 'Perbarui Admin',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'admin',
            'users'         => $user->first(),
            'login_history' => Users::join('login_histories', 'login_histories.user_id', 'users.id')->where('login_histories.user_id', auth()->user()->id)->get(),
        ];

        return view('users.profile', $data);
    }

    public function profile(Request $request)
    {
        $user = Users::where('id', auth()->user()->id)->first();
        (filesize($request->file('profile_pic')) == false)
            ? $validate = $this->validation('profile-update', $request)
            : $validate = $this->validation('profile-update-img', $request);
        if ($validate->fails()) {
            return redirect('profile')->withErrors($validate)->withInput();
        }

        $profile_pic = $request->file('profile_pic');
        if (filesize($profile_pic) == false) {
            $profile_pic = $user->profile_pic;
        } else {
            $count_file = count($profile_pic['name']);
            if ($count_file > 1) {
                return redirect('profile')->with('notif-x', 'you just can upload 1 files')->withInput();
            }
            $profile_pic_name = time() . '_' . $profile_pic->hashName();
            $profile_pic->move(public_path('media/upload/profile/'), $profile_pic_name);
            $profile_pic = $profile_pic_name;
            $unlink_old_pic = unlink(public_path('media/upload/profile/' . $user->profile_pic));
        }

        $data = [
            'email'         => ($request->input('email') != null && auth()->user()->level == 'admin') ? $request->input('email') : auth()->user()->email,
            'password'      => bcrypt($request->input('password')),
            'level'         => (auth()->user()->level == 'admin') ? $request->input('level') : auth()->user()->level,
            'name'          => $request->input('name'),
            'phone'         => $request->input('phone'),
            'gender'        => $request->input('gender'),
            'address'       => $request->input('address'),
            'date_born'     => $request->input('date_born'),
            'profile_pic'   => $profile_pic,
        ];

        $result = Users::where('id', $user->id)->update($data);
        if ($result == true) {
            return redirect('profile')->with('notif-y', 'sukses');
        } else {
            return redirect('profile')->with('notif-x', 'error')->withInput();
        };
    }

    public function change_passwd_index(Users $user)
    {
        $check_users = $user::where('id', $user->id)->count();
        $data = [
            'title'         => 'Perbarui Password',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'update',
            'position'      => 'profile',
            'users_count'   => $check_users,
            'users'         => $user::where('id', $user->id)->first(),
        ];

        return view('users.change_passwd', $data);
    }

    public function change_passwd(Request $request, Users $user)
    {
        $validate = $this->validation('password', $request);
        if ($validate->fails()) {
            return redirect('users/' . $user->id . '/change_password')->withErrors($validate)->withInput();
        }

        $data = [
            'password'      => bcrypt($request->input('password')),
        ];

        $result = Users::where('id', $user->id)->update($data);
        if ($result == true) {
            return redirect('users/' . $user->id)->with('notif-y', 'sukses');
        } else {
            return redirect('users/' . $user->id)->with('notif-x', 'error')->withInput();
        };
    }

    public function logout(Request $request)
    {
        LoginHistory::create(['user_id' => auth()->user()->id, 'description' => 'logout']);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function login(Request $request)
    {
        $validate = $this->validation('login', $request);
        if ($validate->fails()) {
            return redirect(url('login'))->withErrors($validate)->withInput();
        }

        $remember_me = ($request->input('remember_me') == 1) ? true : false;
        $csrf = csrf_token();
        $data = [
            'email'         => $request->input('email'),
            'password'      => $request->input('password'),
        ];
        $data_cookie_a = [
            'name'      => 'satrio_n_w_remember-me',
            'value'     => $request->input('email')
        ];

        if (auth()->attempt($data, $remember_me) == true) {
            $cookie = new Cookie;
            $request->session()->regenerate();
            $cookie->create($data_cookie_a, 'year');
            $result = LoginHistory::create(['user_id' => auth()->user()->id, 'description' => 'login']);

            if ($result == true) {
                return redirect()->intended('dashboard');
            }
        }

        return redirect('login')->with('notif-x', 'email/password salah')->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect(url('register'))->withErrors($validate)->withInput();
        }

        $profile_pic = $request->file('profile_pic');
        if (filesize($profile_pic) == false) {
            $profile_pic = '';
        } else {
            $count_file = count($profile_pic['name']);
            if ($count_file > 1) {
                return redirect('register')->with('notif-x', 'you just can upload 1 files')->withInput();
            }
            $profile_pic_name = time() . '_' . $profile_pic->hashName();
            $profile_pic->move(public_path('media/upload/profile/'), $profile_pic_name);
            $profile_pic = $profile_pic_name;
        }

        $data = [
            'id'            => $this->id_generate(),
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
            'level'         => 'user',
            'name'          => $request->input('name'),
            'phone'         => $request->input('phone'),
            'gender'        => $request->input('gender'),
            'address'       => $request->input('address'),
            'date_born'     => $request->input('date_born'),
            'profile_pic'   => $profile_pic,
        ];

        $result = Users::create($data);
        if ($result == true) {
            return redirect('login')->with('notif-y', 'sukses, silahkan login');
        } else {
            return redirect('register')->with('notif-x', 'error')->withInput();
        };
    }

    public function id_generate()
    {
        $main = md5(Str::random(255));
        $check = Users::where('id', $main)->count();

        if ($check == 0) {
            return $main;
        } else {
            return $this->id_generate();
        }
    }

    public function validation($type = false, $request)
    {
        switch ($type) {
            case 'login':
                $validation = validator($request->all(), [
                    'email'                     => ['required', 'email:rfc,dns'],
                    'password'                  => ['required', Password::min(8)->mixedCase()],
                ]);
                break;

            case 'password':
                $validation = validator($request->all(), [
                    'password'                  => ['required', 'confirmed', Password::min(8)->mixedCase()],
                    'password_confirmation'     => ['required', 'same:password'],
                ]);
                break;

            case 'update':
                $validation = validator($request->all(), [
                    'email'                     => ['required', 'email:rfc,dns'],
                    'name'                      => ['required', 'string', 'min:5', 'max:50'],
                    'phone'                     => ['required', 'numeric', 'digits_between:10,14'],
                    'gender'                    => ['required', 'string', 'min:1', 'max:1'],
                    'date_born'                 => ['required', 'date'],
                ]);
                break;

            case 'update-img':
                $validation = validator($request->all(), [
                    'email'                     => ['required', 'email:rfc,dns'],
                    'name'                      => ['required', 'string', 'min:5', 'max:50'],
                    'phone'                     => ['required', 'numeric', 'digits_between:10,14'],
                    'gender'                    => ['required', 'string', 'min:1', 'max:1'],
                    'date_born'                 => ['required', 'date'],
                    'address'                   => ['required', 'string', 'min:5'],
                    'profile_pic'               => ['required', 'file', 'mimes:jpg,jpeg,png'],
                ]);
                break;

            case 'profile-update':
                $validation = validator($request->all(), [
                    'email'                     => (auth()->user()->level == 'admin') ? ['required', 'email:rfc,dns'] : '',
                    'name'                      => ['required', 'string', 'min:5', 'max:50'],
                    'phone'                     => ['required', 'numeric', 'digits_between:10,14'],
                    'gender'                    => ['required', 'string', 'min:1', 'max:1'],
                    'date_born'                 => ['required', 'date'],
                    'password'                  => ['required', 'confirmed', Password::min(8)->mixedCase()],
                    'password_confirmation'     => ['required', 'same:password'],
                ]);
                break;

            case 'profile-update-img':
                $validation = validator($request->all(), [
                    'email'                     => (auth()->user()->level == 'admin') ? ['required', 'email:rfc,dns'] : '',
                    'name'                      => ['required', 'string', 'min:5', 'max:50'],
                    'phone'                     => ['required', 'numeric', 'digits_between:10,14'],
                    'gender'                    => ['required', 'string', 'min:1', 'max:1'],
                    'date_born'                 => ['required', 'date'],
                    'address'                   => ['required', 'string', 'min:5'],
                    'profile_pic'               => ['required', 'file', 'mimes:jpg,jpeg,png'],
                    'password'                  => ['required', 'confirmed', Password::min(8)->mixedCase()],
                    'password_confirmation'     => ['required', 'same:password'],
                ]);
                break;

            default:
                $validation = validator($request->all(), [
                    'email'                     => ['required', 'email:rfc,dns', 'unique:users,email'],
                    'name'                      => ['required', 'string', 'min:5', 'max:50'],
                    'phone'                     => ['required', 'numeric', 'digits_between:10,14'],
                    'gender'                    => ['required', 'string', 'min:1', 'max:1'],
                    'date_born'                 => ['required', 'date'],
                    'address'                   => ['required', 'string', 'min:5'],
                    'profile_pic'               => ['required', 'file', 'mimes:jpg,jpeg,png'],
                    'password'                  => ['required', 'confirmed', Password::min(8)->mixedCase()],
                    'password_confirmation'     => ['required', 'same:password'],
                ]);
                break;
        }

        return $validation;
    }
}
