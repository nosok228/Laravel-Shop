<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails())
        {
            echo $validator->messages()->first();
        }
        else 
        {
            $token = str_random(30);
            $data = [
                'login' => $request->input('login'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'remember_token' => $token
            ];

            $result = $this->create($data);
            if($result)
            {
                
                mail($data['email'], 'Регистрация на сайте: '.route('index'), route('index').'/activate/'.$token);
                echo "Вы успешно зарегестрировались. Потвердите свой email<br>";
                die;
            }
        }
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
            'login' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], 
        [
            'required' => ':attribute обязателен для заполнения',
            'unique' => ':attribute уже занят',
            'max' => ':attribute не должен быть больше :max символов',
            'min' => ':attribute должен быть больше :min символов',
            'confirmed' => 'Пароли должны совпадать',
            'email'  => 'Email адресс введен некоректно'
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
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $data['remember_token']
        ]);
    }

    public function activate($token)
    {
        $user = User::where('remember_token', $token)->first();
        
        if($user->status == 0)
        {
            $user->remember_token = 'confirmed';
            $user->save();
            return redirect(route('index'));
        }
    }
}
