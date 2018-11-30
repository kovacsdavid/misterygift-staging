<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'kar' => 'required|string|max:255',
            'facebook_profile' => 'required|string|max:255',
            'short_introduction' => 'required|string|max:1000',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'privacypolicy' => 'required',
            'want-to-gift' => 'required',
        ], [
            'first_name.required' => 'Mező kitöltése kötelező',
            'first_name.string' => 'Nem megfelelő formátum',
            'first_name.max' => 'A mező nem lehet több 255 karakternél',
            'last_name.required' => 'Mező kitöltése kötelező',
            'last_name.string' => 'Nem megfelelő formátum',
            'last_name.max' => 'A mező nem lehet több 255 karakternél',
            'kar.required' => 'Mező kitöltése kötelező',
            'kar.string' => 'Nem megfelelő formátum',
            'kar.max' => 'A mező nem lehet több 255 karakternél',
            'facebook_profile.required' => 'Mező kitöltése kötelező',
            'facebook_profile.string' => 'Nem megfelelő formátum',
            'facebook_profile.max' => 'A mező nem lehet több 255 karakternél',
            'short_introduction.required' => 'Mező kitöltése kötelező',
            'short_introduction.string' => 'Nem megfelelő formátum',
            'short_introduction.max' => 'A mező nem lehet több 1000 karakternél',
            'email.required' => 'Mező kitöltése kötelező',
            'email.string' => 'Nem megfelelő formátum',
            'email.email' => 'Nem megfelelő e-mail formátum',
            'email.unique' => 'Ez az e-mail cím már foglalt',
            'email.max' => 'A mező nem lehet több 255 karakternél',
            'password.required' => 'Mező kitöltése kötelező',
            'password.string' => 'Nem megfelelő formátum',
            'password.min' => 'A jelszónak minimum 6 karakter hosszúnak kell lennie',
            'password.confirmed' => 'A megadott jelszavak nem egyeznek',
            'privacypolicy.required' => 'Az alkalmazás használatához el kell fogadnod az adatvédelmi tájékoztatót',
            'want-to-gift.required' => 'Kérlek jelezd számunkra, hogy szeretnél-e részt venni az ajándékozásban',
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'kar' => $data['kar'],
            'facebook_profile' => $data['facebook_profile'],
            'short_introduction' => $data['short_introduction'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'want_to_gift_somebody' => $data['want-to-gift'] == "yes" ? true : false,
            'privacypolicy_approved' => $data['privacypolicy'] == "approved" ? true : false,
        ]);
    }
}
