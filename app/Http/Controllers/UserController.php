<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserController extends Controller
{
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
                return redirect()->intended('/');
              };
            case 2:
              $this->validate($request,[
                'email' => 'required',
                'password' => 'required|min:4'
              ]);  
              $email = $request['email'];
              $password = $request['password'];
              if (Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect()->intended('/');
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
              $card = DB::table('activated_cards')
                         ->where('serie',$card_serie)
                         ->where('num',$card_number)
                         ->first();
              /**/
              if (Auth::attempt(['card_id' => $card->id, 'password' => $password],$remember)){
                return redirect()->intended('/');
              };

        }
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
    public function postCallbackByUser(Request $request)
    {
      $this->validate($request,[
        'message' => 'required|min:1'
      ]);
      $message = $request['message'];
      $user_id = $request['id'];
      if (DB::table('callbacks')
        ->insert([
          'message' => $message,
          'user_id' => $user_id
          ]))
        return redirect()->back();
    }
    public function postCallback(Request $request)
    {
      $this->validate($request,[
        'phone'   => 'required',
        'message' => 'required|min:1'
      ]);
      $message = $request['message'];
      $phone = $request['phone'];
      if (DB::table('callbacks')
        ->insert([
          'message' => $message,
          'phone' => $phone
          ]))
        return redirect()->back();
    }
}
