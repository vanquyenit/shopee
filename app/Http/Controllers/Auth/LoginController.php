<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = '/';
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return voidF
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
    }

    /**
     * show login
     *
     * @return view
     */
    public function login()
    {
        return view('author.login');
    }

    /**
     * submit login
     *
     * @return redirect
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $resultUser = $this->userRepository->findByFirst('email', $request->email);
        if ($resultUser) {
            if (Auth::attempt($credentials, $request->remember)) {
                return redirect()->action('Admin\DashboardController@dashboard')
                        ->with('success', trans('validate.msg.login-success'));
            }
        }

        return redirect()->action('Auth\LoginController@login')
                ->with('error', trans('validate.msg.login-error'));

    }

    /**
     * submit logout
     *
     * @return redirect
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->action('Auth\LoginController@login');
    }
}
