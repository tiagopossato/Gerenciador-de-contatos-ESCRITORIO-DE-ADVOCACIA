<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

    protected $redirectTo = 'home';

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'nome' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'nome' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request) {

        $this->validate($request, [
            'email' => 'required', 'password' => 'required', 'active'=>'true',
        ]);
        
        $credentials = $this->getCredentials($request);
        $credentials['email'] .= '@gmail.com';
        
        // This section is the only change
        if (Auth::validate($credentials)) {
            $user = Auth::getLastAttempted();
            if ($user->active) {
                Auth::login($user, $request->has('remember'));
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect($this->loginPath()) // Change this to redirect elsewhere
                                ->withInput($request->only('email', 'remember'))
                                ->withErrors([
                                    'active' => 'You must be active to login.'
                ]);
            }
        }

        return redirect($this->loginPath())
                        ->withInput($request->only('email', 'remember'))
                        ->withErrors([
                            'email' => $this->getFailedLoginMessage(),
        ]);
    }

}
