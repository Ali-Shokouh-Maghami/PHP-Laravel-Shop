<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    // Ali
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //dd($request->all());


        /////1- Validation form
        $this->validateForm($request);
        //dd($request->all());


        /////2-check user not exist


        /////3- insert user in db
        $user = $this->userCreate($request);

        if (! is_null($user) && $user instanceof User){
            //send Verification email
            Auth::login($user);

            return redirect('/');
        }


        /////4- check insert status true and redirect
    }

    private function validateForm(Request $request)
    {
        return $request ->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'email.required' => 'پست الکترونیکی الزامی است.',
            'email.email' => 'پست الکترونیکی نامعتبر است.',
            'email.max' => 'پست الکترونیکی نامعتبر است.',
            'email.unique' => 'این نام کاربری قبلا ثبت شده است',
            'password.required' => 'کلمه عبور الزامی است.',
            'password.min' => 'حداقل طول کلمه عبور 8 کارکتر است.',
            'password.confirmed' => 'تکرار کلمه عبور صحیح نمی باشد',


        ]);
    }
    private function userCreate(Request $request)
    {
        return User::create([
            'email' => $request -> email,
            'password' => Hash::make($request -> password )
        ]);
    }

}
