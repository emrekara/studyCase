<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct(){

    }

    public function showLoginForm()
    {
        if(isset(Auth::guard('admin')->user()->id)){
            return redirect()->route('admin.dashboard.index');
        }else{
            return view('admin.auth.login');
        }
    }

    public function login(Request $request,$mail_control=false)
    {
        $this->validateLogin($request,$mail_control);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if (Auth::guard('admin')->attempt(array('email' => $request["email"], 'password' => $request["password"]))) {
            return $this->sendLoginResponse($request);
        }else{
            $errorMessage=__('general.login_banned');
            return redirect()->route('admin.login',["errorMessage"=>$errorMessage]);
        }
    }

    protected function validateLogin(Request $request,$mailControl=false)
    {
        $valid=[
            $this->username()=>'required|string',
            "password"=>'required|string'
        ];
        $request->validate([
            $valid
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password','login_code');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.dashboard.index');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
