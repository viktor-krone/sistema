<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Empresa;

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
    protected $redirectTo = '/admin';

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

        $this->validateLogin($request);

        $credentials['empresa_id'] = $this->getIdEmpresa($request);

        if ( $credentials['empresa_id'] == 0 ) {
            //mensaje empresa no activa
            return back()->with('error', 'Empresa No Disponible');
        }


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

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['empresa_id'] = $this->getIdEmpresa($request);

        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            //dd("paso");
            return redirect()->intended('dashboard');
        }

        /*return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );*/
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'rut_empresa' => 'required|string',
        ]);

    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        //dd($request['rut_empresa']);
        $credentials = $request->only($this->username(), 'password');
        $credentials['rut_empresa'] = $request['rut_empresa'];
        //$credentials['datoEmpresa_id'] = $this->getIdEmpresa($request);

       return $credentials;
        //return $request->only($this->username(), 'password',1);
    }

    /**
     * Validate the empresa exista request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function getIdEmpresa(Request $request)
    {
        $id = 0;

        $datoEmpresas = Empresa::where('rut_empresa', $request->rut_empresa )
            ->where('estado', 1 )
            ->get();


        if ($datoEmpresas->count() > 0) {
            // code...
            $id = $datoEmpresas[0]['id'];
        }

        return $id;

    }

}
