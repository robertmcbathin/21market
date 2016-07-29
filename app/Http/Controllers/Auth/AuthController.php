<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * Check the posted by user data and authorizing it
     *
     * @request  array  $request
     * @return User
     */
    public function postLogIn(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:4'
            ]);
        $username = $request['username'];
        $password = $request['password'];
        if (Auth::attempt(['username' => $username, 'password' => $password])){
            return redirect()->route($this->redirectTo);
        }
        return redirect()->back();
      /*  if (Hash::check($password, $hashed_password)){
            $user = new Employee();
            $user->username = $username;
            Auth::login($user);
            return redirect()->route($this->redirectTo);
        }
        return redirect()->back();*/
    }
    public function getLogIn()
    {
        return view('auth.login');
    }
    public function getLogOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
}
