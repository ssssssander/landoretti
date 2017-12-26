<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '/en/profile';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'country' => 'required|string|in:BE,NL,GB,FR,LU',
            'zip' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'calling_code' => 'required|string|in:+32,+31,+44,+33,+352',
            'phone_number' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'vat_number' => 'required|string|max:255',
            'alt_payment' => 'required|string|max:255',
            'agree_tac' => 'required|accepted',
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
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'zip' => $data['zip'],
            'city' => $data['city'],
            'address' => $data['address'],
            'phone_number' => $data['calling_code'] . $data['phone_number'],
            'account_number' => $data['account_number'],
            'vat_number' => $data['vat_number'],
            'alt_payment' => $data['alt_payment'],
        ]);
    }
}
