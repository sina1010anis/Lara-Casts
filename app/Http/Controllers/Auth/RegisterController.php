<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    //---------------------------------------register google
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->L_name = $googleUser->name;
                $user->company = 'null';
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1, 10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
            return 'error';
        }
    }
    //----------------------------end register google
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
            'L_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'recaptcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'L_name' => $data['L_name'],
            'company' => $data['company'],
            'password' => Hash::make($data['password']),
        ]);
    }
}





