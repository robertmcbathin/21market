<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserController extends Controller
{
  public $email;
  protected $user;
  public function generatePassword($length = 8)
    {
      $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
      $numChars = strlen($chars);
      $string = '';
      for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
      }
      return $string;
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
              $this->
validate($request,[
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
              if (Auth::attempt(['card_id' => $card->id, 'password' => $password])){
                return redirect()->intended('/');
              };

        }
    }
    public function getLogIn()
    {
        return view('auth.login');
    }
        public function getSignUp()
    {
        return view('auth.signup');
    }
    public function getActivationCallback()
    {
      return view('callbacks.activation_ok');
    }

     public function postSignUp (Request $request)
    {
      $this->validate($request,[
        'second_name' => 'required|max:50',
        'first_name' => 'required|max:50',
        'dob' => 'date',
        'phone' => 'required|max:15|unique',
        'email' => 'required|email|max:50|unique'
        ]);
        /*INITIALIZING THE VARIABLES*/
        $third_name = '';
        $sex        = 'U';
        $dob        = NULL;
        /*--------------------------*/
      /*----------------------*/
      /*OWNER CREDENTIALS*/
      $second_name = $request['second_name'];
      $first_name  = $request['first_name'];
      $third_name  = $request['third_name'];
      $sex         = $request['sex'];
      $dob         = $request['dob'];
      /*-----------------*/
      /*CONTACT INFORMATION*/
      $phone = $request['phone'];
      $email = $request['email'];
      /*-------------------*/
      $password_to_send = $this->generatePassword();
      $password         = bcrypt($password_to_send);
        /*SAVE TO DATABASE*/
        DB::transaction(function() use ($password,$first_name,$second_name,$third_name,$sex,$dob,$phone,$email){
                    /*ACTIVATE USER ACCOUNT*/
         $new_user_id = DB::table('users')->insertGetId([
              'username' => '',
              'first_name' => $first_name,
              'second_name' => $second_name,
              'patronymic' => $third_name,
              'email' => $email,
              'phone' => $phone,
              'sex' => $sex,
              'dob' => $dob,
              'password' => $password,
              'card_id' => null,
              'is_active' => 1
          ]);
          /*GET USER ROW*/
                    $this->user = DB::table('users')
                        ->where('id', $new_user_id)
                        ->first();
        });
                    /*GET USER ROW*/
                $user_id = $this->user->id;
                $email   =$this->user->email;
                /*MAIL ABOUT HOW GREAT THE SIGN UP WAS*/
                Mail::send('emails.email_confirmed',
                      ['user_id' => $user_id,
                       'email' => $email,
                       'password' => $password_to_send],
                       function ($m) use ($email){
                $m->from('activation@21market.ru', '21market');
                $m->to($email)->subject('Успешная активация аккаунта на портале 21market');
                });
                /*------------------------------------*/
              return redirect()->route('activation.ok');
    }
    public function getLogOut()
    {
        if (Session::has('cart')){
          Session::forget('cart');
        }
        Auth::logout();
        return redirect()->route('home');
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    /*CALLBACKS*/
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
    /*-------**/
    /*DESIRES*/
    public function postDesireByUser(Request $request)
    {
      $this->validate($request,[
        'message' => 'required|min:1'
      ]);
      $message = $request['message'];
      $user_id = $request['id'];
      if (DB::table('desires')
        ->insert([
          'message' => $message,
          'user_id' => $user_id
          ]))
        return redirect()->back();
    }
    public function postDesire(Request $request)
    {
      $this->validate($request,[
        'phone'   => 'required',
        'message' => 'required|min:1'
      ]);
      $message = $request['message'];
      $phone = $request['phone'];
      if (DB::table('desires')
        ->insert([
          'message' => $message,
          'phone' => $phone
          ]))
        return redirect()->back();
    }
    /*-------*/
    public function getProfile()
    {
      $orders = Auth::user()->orders;
      $orders->transform(function($order, $key){
        $order->cart = unserialize($order->cart);
        return $order;
      });
      return view('profile', ['orders' => $orders]);
    }
    public function showPrivacyPolitics()
    {
      return view('privacy');
    }
    public function showEula()
    {
      return view('eula');
    }
}