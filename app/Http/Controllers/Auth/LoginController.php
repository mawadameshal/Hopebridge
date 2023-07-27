<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserLogin;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $username = $request->get("email");
        $password = $request->get("password");
        $status =1;
        $attempt = ['username' => $username, 'password' => $password, 'is_active' => $status];
        if (!filter_var($username, FILTER_VALIDATE_EMAIL) === false) {
            $attempt2 = ['email' => $username, 'password' => $password, 'is_active' => $status];
        }

//        dd(Hash::make('123123'));
        if (\Auth::attempt($attempt) || (isset($attempt2) && \Auth::attempt($attempt2))) {
            $user = \Auth::User();
//            if ($user->role->status != $status) {
//                \Auth::logout();
//                return redirect(parent::$data['cp_route_name'] . "/login")->with("error", "تأكد من معلومات الدخول");
//            }

             $id = \Auth::user()->id;
             $last_login = date('Y-m-d H:i:s');
             $last_ip = $_SERVER["REMOTE_ADDR"];
             User::updateLoginInfo($id, $last_login, $last_ip);

             $login = new UserLogin();
             $login->saveData($id,$last_login,$last_ip);


            return redirect()->route('home');
        }

        return redirect("login")->with("error", "تأكد من معلومات الدخول");


    }


}
