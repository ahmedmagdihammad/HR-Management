<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


        public function showCompanyLoginForm()
    {
        return view('auth.login', ['url' => 'company']);
    }

    public function companyLogin(Request $request)
    {
        $this->validate($request, [
            'user_name'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('company')->attempt(['user_name' => $request->user_name, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/company');
        }
        return back()->withInput($request->only('user_name', 'remember'));
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:company')->except('logout');
    }
}
