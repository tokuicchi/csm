<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Ellaisys\Cognito\Auth\AuthenticatesUsers as CognitoAuthenticatesUsers;

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

    use CognitoAuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ログインフォームの表示
     *
     * @return void
     */
    public function showLoginForm() {
        return view("auth.login");
    }

    /**
     * Authenticate User
     * 
     * @throws \HttpException
     * 
     * @return mixed
     */
    public function login(\Illuminate\Http\Request $request)
    {
        //Convert request to collection
        $collection = collect($request->all());

        //Authenticate with Cognito Package Trait (with 'web' as the auth guard)
        if ($response = $this->attemptLogin($collection, 'web')) {
            if ($response===true) {
                return redirect(route('home'))->with('success', true);
            } else if ($response===false) {
                $this->incrementLoginAttempts($request);
                
                $this->sendFailedLoginResponse($collection, null);
            } else {
                return $response;
            }
        }

    }
}
