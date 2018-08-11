<?php

namespace App\Http\Controllers\Noauth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        AuthenticatesUsers::login as traitLogin;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('noauth.login');
    }

    public function login()
    {
        return $this->traitLogin(request());
    }

    private function _getLoginField()
    {
        $usr = request()->usr;

        if( is_numeric($usr) ){
            return 'phone';
        }

        return filter_var($usr, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    public function username()
    {
        $login = request()->usr;
        $field = $this->_getLoginField();
        request()->merge([$field => $login]);
        return $field;
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials_arr = $request->only($this->username(), 'password');
        $credentials_arr['userstatus_id'] = 1;
        $credentials_arr['can_login'] = 1;
        return $credentials_arr;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        $this->logActivity('login', 'user logged in');

        return response()->json([
            'status' => 'success',
            'message' => 'Authenticated!. Redirecting...',
            'url' => redirect()->intended($this->_getLoggedRedirect())->getTargetUrl()
        ]);
    }

    private function _getLoggedRedirect()
    {
        return $this->guard()->user()->profile_type;
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->logActivity('logout', 'user logged out');
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }

}
