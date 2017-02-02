<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\RegisteredUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function confirm($id, $token) {
        $user = User::where('id', $id)->where('confirmation_token', $token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null]);
            $this->guard()->login($user);
            return redirect($this->redirectPath())->with('success', trans('auth.confirmed'));
        } else {
            return redirect('/login')->with('error', trans('auth.invalid_token'));
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
        return redirect('/login')->with('success', trans('auth.signed_up'));
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
            'username' => 'required|max:255|unique:users|alpha_num',
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
            'username' => strtolower($data['username']),
            'display_name' => ucfirst(strtolower($data['username'])),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => md5(rand() . uniqid() . time())
        ]);
    }
}
