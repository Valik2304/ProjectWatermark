<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
   public function showLoginForm()
    {
        session()->put('previous_url', url()->previous());
        session()->flash('not_ajax', true);

        return view('auth.login');
    }




    public function logout(Request $request)
    {
        \Cart::instance(getInstanceCart())->destroy();
        \Cart::instance('cart')->destroy();
        $destination = \Auth::logout();


        return redirect()->to($destination);
    }

    public function redirectTo()
    {
        return  session()->pull('previous_url');
    }

    public function login(Request $request)
    {
       if ( !(session()->has('previous_url'))) {
           session()->put('previous_url', url()->previous());
       }
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function sendLoginResponse(Request $request)
    {


        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        \Cart::instance(getInstanceCart())->restore(getInstanceCart());
        \Cart::instance(getInstanceCartZip())->restore(getInstanceCartZip());
        \Cart::instance('cart')->content()->each(function ($item,$key){
            \Cart::instance(getInstanceCart())->add($item->id,$item->name,$item->qty,$item->price,$item->options->toArray());
        });
        \Cart::instance(getInstanceCart())->store(getInstanceCart());



        $previous_url = session()->pull('previous_url', route('users.edit'));


        $data = response()->json([
            'message' => 'success login',
            'success' => true,
            'previous_url' => $previous_url
        ]);
        if (session()->pull('not_ajax')){
            $data = redirect($previous_url);
        }


        return $this->authenticated($request, $this->guard()->user())
            ?: $data;
    }
}
