<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use Illuminate\Http\Request;
use Validator;
use DB;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

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
        $auth_type = $request['auth_type'];
        switch ($auth_type){
            case 1:
              $this->validate($request,[
                'phone' => 'required',
                'password' => 'required|min:4'
              ]);  
              $phone = $request['phone'];
              $password = $request['password'];
              if (Auth::attempt(['phone' => $phone, 'password' => $password])){
                return redirect()->route('home');
              };
            case 2:
              $this->validate($request,[
                'email' => 'required',
                'password' => 'required|min:4'
              ]);  
              $email = $request['email'];
              $password = $request['password'];
              if (Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect()->route('home');
              };
              case 3:
              $this->validate($request,[
                'card_serie' => 'required',
                'card_number' => 'required',
                'password' => 'required|min:4'
              ]);  
              $card_serie = $request['card_serie'];
              $card_number = $request['card_number'];
              $password = $request['password'];

              /*GET THE CARD ID*/
              $card_id = DB::table('activated_cards')
                         ->select('id')
                         ->where('serie',$card_serie)
                         ->where('num',$card_number)
                         ->first();
              /**/
              if (Auth::attempt(['card_id' => $card_id, 'password' => $password])){
                return redirect()->route('home');
              };

        }
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
        Session::flush();
        SetCookie("laravel_session", "хуй", time()-3600);
        session_destroy();
        return redirect()->route('home');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
}
